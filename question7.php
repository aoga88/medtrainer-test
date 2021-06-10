<?php

interface CacheDriver
{
    public put($key, $value);

    public get($key);
}

class NoneCacheDriver implements CacheDriver
{
    public function put($key, $value)
    {
        return true;
    }

    public function get($key)
    {
        return null;
    }
}

class APCDriver implements CacheDriver
{
    public function put($key, $value)
    {
        // put on apc
    }

    public function get($key)
    {
        // get from apc
    }
}

class MemcacheDriver implements CacheDriver
{
    public function put($key, $value)
    {
        // put on memcache
    }

    public function get($key)
    {
        // get from memcache
    }
}

class Cache
{
    private CacheDriver $cacheDriver;

    public function __construct($env)
    {
        if ($env == 'production') {
            $this->cacheDriver = new MemcacheDriver();
        } elseif ($env == 'staging') {
            $this->cacheDriver = new APCDriver();
        } else {
            $this->cacheDriver = new NonCacheDriver();
        }
    }

    public function put($key, $value)
    {
        $this->cacheDriver->put($key, $value);
    }

    public function get($key)
    {
        $this->cacheDriver->get($key);
    }
}