<?php
declare(strict_types=1);

namespace App\Console;

use Composer\Script\Event;

if (!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}
$paths = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR .
    'config' . DIRECTORY_SEPARATOR .
    'paths.php';
require_once $paths;

class ReactWidgets
{
    const CRA_DIR = RESOURCES . 'react-widgets';
    const WEBROOT_TARGET = WWW_ROOT . 'reactWidgets';
    const CRA_SOURCE_DIR = self::CRA_DIR . DS . 'dist';

    public static function postInstall(Event $event)
    {
        self::install($event);
        self::build($event);
    }

    public static function install(Event $event)
    {
        $io = $event->getIO();

        $io->write('Installing node modules');
        passthru('cd ' . self::CRA_DIR . ' && yarn install');
    }

    public static function build(Event $event)
    {
        $io = $event->getIO();

        $io->write('Building widgets');
        passthru('cd ' . self::CRA_DIR . ' && yarn build:widgets');

        $io->write('Creating a symlink to assets');
        symlink(self::CRA_SOURCE_DIR, self::WEBROOT_TARGET);
    }
}
