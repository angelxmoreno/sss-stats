<?php

namespace App\Model\Dao;

use Cake\Utility\Text;

class HeaderBody
{
    protected string $headerText;
    protected string $bodyText;
    protected string $headerId;
    protected string $bodyId;
    protected bool $active;

    /**
     * @param string $headerText
     * @param string $bodyText
     * @param string|null $headerId
     * @param string|null $bodyId
     * @param bool|null $is_active
     */
    public function __construct(string $headerText, string $bodyText, ?string $headerId = null, ?string $bodyId = null, ?bool $active = null)
    {
        $uuid = Text::uuid();
        $this->headerText = $headerText;
        $this->bodyText = $bodyText;
        $this->headerId = $headerId ?? 'headerId_' . $uuid;
        $this->bodyId = $bodyId ?? 'bodyId_' . $uuid;
        $this->active = $active ?? false;
    }

    /**
     * @return string
     */
    public function getHeaderText(): string
    {
        return $this->headerText;
    }

    /**
     * @param string $headerText
     * @return HeaderBody
     */
    public function setHeaderText(string $headerText): HeaderBody
    {
        $this->headerText = $headerText;
        return $this;
    }

    /**
     * @return string
     */
    public function getBodyText(): string
    {
        return $this->bodyText;
    }

    /**
     * @param string $bodyText
     * @return HeaderBody
     */
    public function setBodyText(string $bodyText): HeaderBody
    {
        $this->bodyText = $bodyText;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeaderId(): string
    {
        return $this->headerId;
    }

    /**
     * @param string $headerId
     * @return HeaderBody
     */
    public function setHeaderId(string $headerId): HeaderBody
    {
        $this->headerId = $headerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBodyId(): string
    {
        return $this->bodyId;
    }

    /**
     * @param string $bodyId
     * @return HeaderBody
     */
    public function setBodyId(string $bodyId): HeaderBody
    {
        $this->bodyId = $bodyId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return HeaderBody
     */
    public function setActive(bool $active): HeaderBody
    {
        $this->active = $active;
        return $this;
    }

}
