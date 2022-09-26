<?php

namespace LeagueAuth\Core;

use League\OAuth2\Client\Provider\AbstractProvider;

class LeagueAuthProvider
{
    protected string $name;
    protected AbstractProvider $provider;
    protected IdentityBuilderInterface $identityBuilder;

    public function __construct(string $name, AbstractProvider $provider, IdentityBuilderInterface $identityBuilder)
    {
        $this->name = $name;
        $this->provider = $provider;
        $this->identityBuilder = $identityBuilder;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return AbstractProvider
     */
    public function getProvider(): AbstractProvider
    {
        return $this->provider;
    }

    /**
     * @return IdentityBuilderInterface
     */
    public function getIdentityBuilder(): IdentityBuilderInterface
    {
        return $this->identityBuilder;
    }
}
