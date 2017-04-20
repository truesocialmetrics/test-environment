<?php

namespace Test\Framework\Environment\Stub\ServiceManager;

use PHPUnit\Framework\TestCase;

class ServiceManagerMockTest extends TestCase
{
    public function test()
    {
        $mock = new ServiceManager();
        $mock->set('test', 'abc');
        $this->assertFalse($mock->has('non-exists'));
        $this->assertTrue($mock->has('test'));
        $this->assertEquals('abc', $mock->get('test'));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNonExists()
    {
        $mock = new ServiceManager();
        $mock->get('test');
    }
}