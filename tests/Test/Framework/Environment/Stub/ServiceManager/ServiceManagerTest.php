<?php

namespace Test\Framework\Environment\Stub\ServiceManager;

use PHPUnit\Framework\TestCase;

class ServiceManagerTest extends TestCase
{
    public function test()
    {
        $mock = new ServiceManager();
        $mock->set('test', 'abc');
        $this->assertFalse($mock->has('non-exists'));
        $this->assertTrue($mock->has('test'));
        $this->assertEquals('abc', $mock->get('test'));
    }

    public function testNonExists()
    {
        $this->expectException(\InvalidArgumentException::class);
        $mock = new ServiceManager();
        $mock->get('test');
    }
}
