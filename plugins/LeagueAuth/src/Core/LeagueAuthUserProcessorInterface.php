<?php
declare(strict_types=1);

namespace LeagueAuth\Core;

use LeagueAuth\Model\Entity\AuthProvider;

interface LeagueAuthUserProcessorInterface
{
    public function processAuthProvider(AuthProvider $authProvider);
}
