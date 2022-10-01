<?php

namespace App\Service;

use Cake\Cache\Cache;

trait ApiCacheTrait
{
    protected function setNextPageToken(string $prefix, array $names, ?string $nextPageToken): bool
    {
        $names[1]['pageToken'] = null;
        $key = $this->buildCacheKey('NextPageToken' . $prefix, $names);
        return Cache::write($key, $nextPageToken, $this->getCacheName());
    }

    /**
     * @param string $prefix
     * @param array $names
     * @return string
     */
    protected function buildCacheKey(string $prefix, array $names = []): string
    {
        return $prefix . md5(serialize($names));
    }

    /**
     * @return string
     */
    protected function getCacheName(): string
    {
        return $this->cacheName ?? 'default';
    }

    protected function getNextPageToken(string $prefix, array $names): ?string
    {
        $names[1]['pageToken'] = null;
        $key = $this->buildCacheKey('NextPageToken' . $prefix, $names);
        return Cache::read($key, $this->getCacheName());
    }

    /**
     * @param string $prefix
     * @param array $names
     * @param callable $callable
     * @return mixed
     */
    protected function cacheRemember(string $prefix, array $names, callable $callable)
    {
        $key = $this->buildCacheKey($prefix, $names);
        return Cache::remember($key, $callable, $this->getCacheName());
    }
}
