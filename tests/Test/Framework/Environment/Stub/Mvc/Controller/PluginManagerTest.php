<?php

namespace Test\Framework\Environment\Stub\Mvc\Controller;

use PHPUnit_Framework_TestCase;

class ServiceManagerMockTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $mock = new PluginManager();
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
        $mock = new PluginManager();
        $mock->get('test');
    }
}