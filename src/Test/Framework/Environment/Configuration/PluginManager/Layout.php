<?php

namespace Test\Framework\Environment\Configuration\PluginManager;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;
use PHPUnit\Framework\MockObject\MockBuilder;

class Layout implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        // $mock = $this->getTestCase()->getMockBuilder()
        //              ->disableOriginalConstructor()
        //              ->getMock();

        // foreach ($options as $method => $value) {
        //     $mock->expects($this->getTestCase()->any())
        //          ->method($method)
        //          ->with($value);
        // }
        // $options = array_merge([
        //     self::FIELD_METHODS => [],
        // ], $options);

        $mock = (new MockGenerator)->testDouble(
            'Laminas\Mvc\Controller\Plugin\Layout',
            true,
            false,
            callOriginalConstructor: false,
            callOriginalClone: false,
            cloneArguments: false,
            allowMockingUnknownTypes: false,
        );

        foreach ($options as $method => $return) {
            $stub->method($method)->willReturn($return);
        }


        $object->getPluginManager()->set('layout', $mock);
    }
}
