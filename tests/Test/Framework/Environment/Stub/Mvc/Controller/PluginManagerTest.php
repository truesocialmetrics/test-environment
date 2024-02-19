<?php

namespace Test\Framework\Environment\Stub\Mvc\Controller;

use PHPUnit\Framework\TestCase;

class PluginManagerTest extends TestCase
{
    public function test()
    {
        $mock = new PluginManager();
        $mock->set('test', 'abc');
        $this->assertFalse($mock->has('non-exists'));
        $this->assertTrue($mock->has('test'));
        $this->assertEquals('abc', $mock->get('test'));
    }

    public function testNonExists()
    {
        try {
            $mock = new PluginManager();
            $this->assertFalse($mock->has('test'));
            $mock->get('test');
            $this->assertTrue(false, 'Excepted InvalidArgumentException');
        } catch (\InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }
}
