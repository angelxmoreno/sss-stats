<?php

namespace LeagueAuth\Core;

use League\OAuth2\Client\Token\AccessTokenInterface;

interface IdentityBuilderInterface
{
    public function buildLeagueAuthUser(AccessTokenInterface $accessToken): LeagueAuthUser;

    public function getProviderName(): string;
}
