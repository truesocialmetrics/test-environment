<?php

namespace Test\Framework\Environment\Configuration\PluginManager;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;

class Forward implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        $stub = (new MockGenerator)->testDouble(
            'Laminas\Mvc\Controller\Plugin\Forward',
            true,
            false,
            callOriginalConstructor: false,
            callOriginalClone: false,
            cloneArguments: false,
            allowMockingUnknownTypes: false,
        );
        $stub->method('dispatch')->willReturnCallback(function () {
            return func_get_args();
        });

        $object->getPluginManager()->set('forward', $stub);
    }
}
