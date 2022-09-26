<?php
declare(strict_types=1);

namespace App\Model\Helper;

use Authentication\PasswordHasher\DefaultPasswordHasher;

trait UserEntityTrait
{
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return $password;
    }
}
