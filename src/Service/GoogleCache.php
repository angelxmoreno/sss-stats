<?php

namespace App\Service;

use Cache\Adapter\Filesystem\FilesystemCachePool;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Psr\Cache\CacheItemPoolInterface;

class GoogleCache extends FilesystemCachePool implements CacheItemPoolInterface
{

    protected static ?GoogleCache $_instance = null;

    public function __construct()
    {
        $filesystemAdapter = new Local(CACHE);
        $filesystem = new Filesystem($filesystemAdapter);
        parent::__construct($filesystem, 'GoogleApi');
    }

    public static function getInstance(): GoogleCache
    {
        if (!self::$_instance) {
            self::$_instance = new GoogleCache();
        }

        return self::$_instance;
    }
}
