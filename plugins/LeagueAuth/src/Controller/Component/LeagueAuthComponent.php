<?php
declare(strict_types=1);

namespace LeagueAuth\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Core\Exception\CakeException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use LeagueAuth\Core\LeagueAuthProvider;
use LeagueAuth\Core\LeagueAuthUserProcessorInterface;
use LeagueAuth\Model\Table\AuthProvidersTable;
use RuntimeException;

/**
 * LeagueAuth component
 *
 */
class LeagueAuthComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    /**
     * @var LeagueAuthProvider[]
     */
    protected array $leagueAuthProviders = [];

    public function initialize(array $config): void
    {
        $this->ensureCanProcessLeagueUser();
        $config = array_merge(Configure::read('LeagueAuth', []), $config);
        $this->setConfig($config);
        parent::initialize($config);
        $this->loadLeagueAuthProviders();
    }

    protected function ensureCanProcessLeagueUser()
    {
        $controller = $this->getController();
        $interfaces = class_implements($controller);
        if (!in_array(LeagueAuthUserProcessorInterface::class, $interfaces)) {
            throw new RuntimeException(sprintf(
                'Class %s should implement %s',
                get_class($controller),
                LeagueAuthUserProcessorInterface::class
            ));
        }
    }

    protected function loadLeagueAuthProviders()
    {
        $providerNames = array_keys($this->getConfigOrFail('providers'));
        foreach ($providerNames as $name) {
            $className = $this->getConfigOrFail('providers.' . $name . '.className');
            $identityBuilder = $this->getConfigOrFail('providers.' . $name . '.identityBuilder');
            $params = $this->getConfigOrFail('providers.' . $name . '.params');
            $provider = new $className($params);
            $this->leagueAuthProviders[$name] = new LeagueAuthProvider($name, $provider, new $identityBuilder($provider));
        }
    }

    public function startup(Event $event)
    {
        $controller = $this->getController();
        /** @var string $action */
        $action = $controller->getRequest()->getParam('action');
        if (!method_exists($controller, $action) && array_key_exists($action, $this->leagueAuthProviders)) {
            return $this->runProviderAction($this->leagueAuthProviders[$action]);
        }
    }

    protected function runProviderAction(LeagueAuthProvider $leagueAuthProvider)
    {
        /** @var Controller|LeagueAuthUserProcessorInterface $controller */
        $controller = $this->getController();
        $provider = $leagueAuthProvider->getProvider();
        $identityBuilder = $leagueAuthProvider->getIdentityBuilder();
        $request = $controller->getRequest();
        $session = $request->getSession();
        // If we don't have an authorization code then get one
        if (!$request->getQuery('code', false)) {
            // Fetch the authorization URL from the provider; this returns the
            // urlAuthorize option and generates and applies any necessary parameters
            // (e.g. state).
            $authorizationUrl = $provider->getAuthorizationUrl();

            // Get the state generated for you and store it to the session.
            $session->write('LeagueAuth.oauth2state', $provider->getState());

            // Optional, only required when PKCE is enabled.
            // Get the PKCE code generated for you and store it to the session.
            //$session->write('oauth2pkceCode',$provider->getPkceCode());

            // Redirect the user to the authorization URL.
            return $controller->redirect($authorizationUrl);
        } // Check given state against previously stored one to mitigate CSRF attack
        elseif (
            !$request->getQuery('state', false) ||
            $session->check('LeagueAuth.oauth2state') &&
            $request->getQuery('state') !== $session->read('LeagueAuth.oauth2state')
        ) {
            $session->delete('oauth2state');
            throw new CakeException('LeagueAuth component error: Invalid state', 400);
        } else {

            try {
                // Optional, only required when PKCE is enabled.
                // Restore the PKCE code stored in the session.
                // $provider->setPkceCode($session->read('oauth2pkceCode'));

                // Try to get an access token using the authorization code grant.
                $accessToken = $provider->getAccessToken('authorization_code', [
                    'code' => $request->getQuery('code'),
                ]);
                /** @var AuthProvidersTable $AuthProviders */
                $AuthProviders = TableRegistry::getTableLocator()->get('LeagueAuth.AuthProviders');
                $authProvider = $AuthProviders->saveLeagueAuthUser($identityBuilder->buildLeagueAuthUser($accessToken));
                return $controller->processAuthProvider($authProvider);
            } catch (IdentityProviderException $e) {
                // Failed to get the access token or user details.
                throw new CakeException('LeagueAuth component error: ' . $e->getMessage(), 400, $e);
            }
        }
    }
}
