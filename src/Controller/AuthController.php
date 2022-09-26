<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\Event\EventInterface;
use Cake\Http\Response;
use Cake\Utility\Security;
use LeagueAuth\Core\LeagueAuthUserProcessorInterface;
use LeagueAuth\Model\Entity\AuthProvider;

/**
 * Auth Controller
 *
 * @property UsersTable $Users
 */
class AuthController extends AppController implements LeagueAuthUserProcessorInterface
{
    public const URL_LOGIN = [
        'prefix' => false,
        'plugin' => false,
        'controller' => 'Auth',
        'action' => 'login',
    ];

    public const URL_AFTER_LOGIN = [
        'prefix' => false,
        'plugin' => false,
        'controller' => 'Episodes',
        'action' => 'index',
    ];

    public const URL_AFTER_LOGOUT = AuthController::URL_AFTER_LOGIN;
    public $defaultTable = UsersTable::class;
    public $modelClass = UsersTable::class;

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('LeagueAuth.LeagueAuth');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions([$this->getRequest()->getParam('action')]);
    }

    /**
     * @return Response|void|null
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $redirect = $this->request->getQuery('redirect', AuthController::URL_AFTER_LOGIN);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout(): Response
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
        }
        return $this->redirect(AuthController::URL_AFTER_LOGOUT);
    }

    /**
     * @return Response|void|null
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->is_admin = false;
            $user->is_manager = false;
            $user->is_enabled = true;

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(AuthController::URL_LOGIN);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function processAuthProvider(AuthProvider $authProvider): Response
    {
        $user = $this->Users->find()->where(['email' => $authProvider->email])->first();

        if ($user && !$authProvider->email_verified) {
            $this->Flash->error(sprintf(
                'A user with that email address already exists. Please verify your email address with %s',
                $authProvider->provider
            ));
            return $this->redirect(AuthController::URL_LOGIN);
        }

        if (!$user) {
            $user = $this->Users->newEntity([
                'name' => $authProvider->name,
                'email' => $authProvider->email,
                'password' => $authProvider->display_name . Security::getSalt(),
                'picture_url' => $authProvider->picture_url,
            ]);
        }

        $user->google_auth_provider_id = $authProvider->id;
        $this->Users->saveOrFail($user);
        $this->Authentication->setIdentity($user);
        $this->Flash->success(sprintf(
            'You have logged in with %s',
            $authProvider->provider
        ));
        $redirect = $this->request->getQuery('redirect', AuthController::URL_AFTER_LOGIN);
        return $this->redirect($redirect);
    }


}
