<?php

namespace App\Service;

use Cake\Core\Configure;
use Google\Client;

class GoogleClientFactory
{
    public static function create(): Client
    {
        $client = new Client();
        $client->setApplicationName(Configure::readOrFail('YouTube.applicationName'));
        $client->setDeveloperKey(Configure::readOrFail('YouTube.apiKey'));
//        $client->setClientId(Configure::readOrFail('YouTube.clientId'));
//        $client->setClientSecret(Configure::readOrFail('YouTube.clientSecret'));
        $client->setScopes([
            'https://www.googleapis.com/auth/youtube.readonly',
        ]);
        return $client;
    }
}
