<?php

namespace Test\Framework\Environment\Stub\Di;

use PHPUnit_Framework_TestCase;

class DiTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $mock = new Di();
        $mock->set('test', [1, 2, 3], 'abc');
        $this->assertFalse($mock->has('test', [1, 2]));
        $this->assertTrue($mock->has('test', [1, 2, 3]));
        $this->assertEquals('abc', $mock->get('test', [1, 2, 3]));
        $this->assertEquals('abc', $mock->newInstance('test', [1, 2, 3]));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testNonExists()
    {
        $mock = new Di();
        $mock->get('test');
    }
}