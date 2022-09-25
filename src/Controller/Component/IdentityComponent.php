<?php
declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\AppController;
use Authentication\IdentityInterface;
use Cake\Controller\Component;
use Cake\Utility\Hash;

/**
 * Identity component
 */
class IdentityComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    /**
     * Identity Object
     *
     * @var null|IdentityInterface
     */
    protected ?IdentityInterface $_identity = null;

    /**
     * Constructor hook method.
     *
     * Implement this method to avoid having to overwrite the constructor and call parent.
     *
     * @param array $config The configuration settings provided to this helper.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        /** @var AppController $controller */
        $controller = $this->getController();
        $this->_identity = $controller->Authentication->getIdentity();
    }

    /**
     * Gets the id of the current logged in identity
     *
     * @return int|null|string
     */
    public function getId()
    {
        if ($this->_identity === null) {
            return null;
        }

        return $this->_identity->getIdentifier();
    }

    /**
     * Checks if a user is logged in
     *
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->_identity !== null;
    }

    /**
     * Gets user data
     *
     * @param string|null $key Key of something you want to get from the identity data
     * @return mixed
     */
    public function get(?string $key = null)
    {
        if (empty($this->_identity)) {
            return null;
        }

        if ($key === null) {
            return $this->_identity->getOriginalData();
        }

        return Hash::get($this->_identity, $key);
    }
}
