<?php

namespace Tests\Unit\Managers\Cache;

use Tests\TestCase;
use App\Managers\Cache\CacheManager;
use Illuminate\Support\Facades\Cache;

class CacheManagerTest extends TestCase
{
    public function testGetOrSet()
    {
        $cacheKey = 'foo';
        $cacheValue = 'bar';

        Cache::shouldReceive('remember')
            ->once()
            ->with($cacheKey, 120, $cacheValue)
            ->andReturn($cacheValue);

        $cacheManager = new CacheManager();
        $result = $cacheManager->getOrSet($cacheKey, $cacheValue);

        $this->assertEquals($cacheValue, $result);
    }

    public function testSet()
    {
        $cacheKey = 'foo';
        $cacheValue = 'bar';

        Cache::shouldReceive('put')
            ->once()
            ->with($cacheKey, $cacheValue, 120);

        $cacheManager = new CacheManager();
        $result = $cacheManager->set($cacheKey, $cacheValue);

        $this->assertEquals($cacheValue, $result);
    }

    public function testRemove()
    {
        $cacheKey = 'foo';

        Cache::shouldReceive('forget')
            ->once()
            ->with($cacheKey);

        $cacheManager = new CacheManager();
        $result = $cacheManager->remove($cacheKey);

        $this->assertNull($result);
    }

    public function testGet()
    {
        $cacheKey = 'foo';
        $cacheValue = 'bar';

        Cache::shouldReceive('get')
            ->once()
            ->with($cacheKey)
            ->andReturn($cacheValue);

        $cacheManager = new CacheManager();
        $result = $cacheManager->get($cacheKey);

        $this->assertEquals($cacheValue, $result);
    }

    public function testExists()
    {
        $cacheKey = 'foo';

        Cache::shouldReceive('has')
            ->once()
            ->with($cacheKey)
            ->andReturn(true);

        $cacheManager = new CacheManager();
        $result = $cacheManager->exists($cacheKey);

        $this->assertTrue($result);
    }
}
