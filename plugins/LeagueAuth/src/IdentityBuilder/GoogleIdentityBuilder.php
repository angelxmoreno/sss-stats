<?php
declare(strict_types=1);

namespace LeagueAuth\IdentityBuilder;

use Cake\Chronos\Chronos;
use Cake\Utility\Hash;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Provider\GoogleUser;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;
use LeagueAuth\Core\IdentityBuilderInterface;
use LeagueAuth\Core\LeagueAuthUser;

class GoogleIdentityBuilder implements IdentityBuilderInterface
{
    protected const PROVIDER_NAME = 'Google';
    protected AbstractProvider $provider;

    /**
     * @param Google $provider
     */
    public function __construct(Google $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param AccessToken $accessToken
     * @return LeagueAuthUser
     */
    public function buildLeagueAuthUser(AccessTokenInterface $accessToken): LeagueAuthUser
    {
        $googleUser = $this->getGoogleUser($accessToken);
        $params = [
            'identifier' => $googleUser->getId(),
            'email_verified' => Hash::get($googleUser->toArray(), 'email_verified', false),
            'name' => $googleUser->getName(),
            'picture_url' => $googleUser->getAvatar(),
            'email' => $googleUser->getEmail(),
            'access_token' => $accessToken->getToken(),
            'refresh_token' => $accessToken->getRefreshToken(),
            'token_expiration' => Chronos::createFromTimestamp($accessToken->getExpires()),
        ];
        return new LeagueAuthUser($params, $this->getProviderName());
    }

    protected function getGoogleUser(AccessToken $accessToken): GoogleUser
    {
        /** @var GoogleUser $resourceOwner */
        $resourceOwner = $this->provider->getResourceOwner($accessToken);
        return $resourceOwner;
    }

    public function getProviderName(): string
    {
        return self::PROVIDER_NAME;
    }


}
