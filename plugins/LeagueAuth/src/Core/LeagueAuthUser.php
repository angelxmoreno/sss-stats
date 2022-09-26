<?php
declare(strict_types=1);

namespace LeagueAuth\Core;

use Cake\Utility\Hash;
use DateTimeInterface;
use UnexpectedValueException;

class LeagueAuthUser
{
    protected string $identifier;
    protected string $providerName;
    protected bool $email_verified = false;
    protected string $email;
    protected array $raw = [];
    protected ?string $name = null;
    protected ?string $picture_url = null;
    protected ?string $access_token = null;
    protected ?string $refresh_token = null;
    protected ?DateTimeInterface $token_expiration = null;

    /**
     * @param array $raw
     * @param string $providerName
     */
    public function __construct(array $raw, string $providerName)
    {
        $this->providerName = $providerName;
        $identifier = Hash::get($raw, 'identifier', null);
        if (!$identifier) {
            throw new UnexpectedValueException('Missing "identifier" key when constructing ' . LeagueAuthUser::class);
        }

        $email = Hash::get($raw, 'email', null);
        if (!$email) {
            throw new UnexpectedValueException('Missing "email" key when constructing ' . LeagueAuthUser::class);
        }

        $this->identifier = $identifier;
        $this->raw = $raw;
        $this->email = $email;

        $this->email_verified = Hash::get($raw, 'email_verified', false);
        $this->name = Hash::get($raw, 'name', null);
        $this->picture_url = Hash::get($raw, 'picture_url', null);
        $this->access_token = Hash::get($raw, 'access_token', null);
        $this->refresh_token = Hash::get($raw, 'refresh_token', null);
        $this->token_expiration = Hash::get($raw, 'token_expiration', null);
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return bool
     */
    public function isEmailVerified(): bool
    {
        return $this->email_verified;
    }

    /**
     * @return array
     */
    public function getRaw(): array
    {
        return $this->raw;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getPictureUrl(): ?string
    {
        return $this->picture_url;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->refresh_token;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getTokenExpiration(): ?DateTimeInterface
    {
        return $this->token_expiration;
    }

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->providerName;
    }
}
