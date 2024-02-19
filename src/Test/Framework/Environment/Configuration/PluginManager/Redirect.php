<?php

namespace Test\Framework\Environment\Configuration\PluginManager;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;

class Redirect implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        $stub = (new MockGenerator)->testDouble(
            'Laminas\Mvc\Controller\Plugin\Redirect',
            true,
            false,
            callOriginalConstructor: false,
            callOriginalClone: false,
            cloneArguments: false,
            allowMockingUnknownTypes: false,
        );
        $stub->method('toUrl')->willReturnCallback(function () {
            return func_get_args();
        });
        $stub->method('toRoute')->willReturnCallback(function () {
            return func_get_args();
        });

        $object->getPluginManager()->set('redirect', $stub);
    }
}
