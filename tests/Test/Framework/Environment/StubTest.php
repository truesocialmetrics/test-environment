<?php

namespace Test\Framework\Environment;

use PHPUnit_Framework_TestCase;

class StubTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $stub = new Stub($this);
        $this->assertEquals($this, $stub->getTestCase());
    }

    public function testBuild()
    {
        $stub = new Stub($this);
        $object = $stub->build([
            'class'   => 'ArrayObject',
            'methods' => [
                'count' => 5,
            ],
        ]);
        $this->assertEquals(0, strpos(get_class($object), 'Mock_'));
        $this->assertEquals(5, $object->count());
    }
}