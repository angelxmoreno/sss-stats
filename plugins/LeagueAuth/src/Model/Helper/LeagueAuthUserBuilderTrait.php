<?php

namespace LeagueAuth\Model\Helper;

use LeagueAuth\Core\LeagueAuthUser;
use LeagueAuth\Model\Entity\AuthProvider;
use LeagueAuth\Model\Table\AuthProvidersTable;

/**
 * @mixin AuthProvidersTable
 */
trait LeagueAuthUserBuilderTrait
{
    public function saveLeagueAuthUser(LeagueAuthUser $leagueAuthUser): AuthProvider
    {
        $user = $this->findOrCreate([
            'provider' => $leagueAuthUser->getProviderName(),
            'identifier' => $leagueAuthUser->getIdentifier(),
        ]);

        $this->patchEntity($user, [
            'name' => $leagueAuthUser->getName(),
            'email' => $leagueAuthUser->getEmail(),
            'email_verified' => $leagueAuthUser->isEmailVerified(),
            'picture_url' => $leagueAuthUser->getPictureUrl(),
            'access_token' => $leagueAuthUser->getAccessToken(),
            'refresh_token' => $leagueAuthUser->getRefreshToken(),
            'token_expires' => $leagueAuthUser->getTokenExpiration(),
        ]);
        $this->saveOrFail($user);
        return $user;
    }
}
