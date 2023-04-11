<?php

namespace Tests\Unit\App\Managers\Reflection;

use App\Managers\Reflection\ReflectionManager;
use PHPUnit\Framework\TestCase;

class TestObject
{
    public $name;
    public $age;
}

class ReflectionManagerTest extends TestCase
{
    public function testReflectToObject_classMatches()
    {
        $reflectionManager = new ReflectionManager();
        $responseBody = '{"name": "John Doe", "age": 25}';
        $stdClass = TestObject::class;

        $result = $reflectionManager->reflectToObject($responseBody, $stdClass);

        $this->assertInstanceOf($stdClass, $result);
    }

    public function testReflectToObject_dataMatches()
    {
        $reflectionManager = new ReflectionManager();
        $responseBody = '{"name": "John Doe", "age": 25}';
        $stdClass = TestObject::class;

        $result = $reflectionManager->reflectToObject($responseBody, $stdClass);

        $this->assertEquals("John Doe", $result->name);
        $this->assertEquals(25, $result->age);
    }
}
