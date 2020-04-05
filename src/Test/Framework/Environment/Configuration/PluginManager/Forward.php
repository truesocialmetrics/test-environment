<?php

namespace Test\Framework\Environment\Configuration\PluginManager;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;

class Forward implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        $stub = $this->getTestCase()->getMockBuilder('Laminas\Mvc\Controller\Plugin\Forward')
                     ->disableOriginalConstructor()
                     ->getMock();

        $stub->method('dispatch')
             ->will($this->getTestCase()->returnCallback(function () {
                return func_get_args();
             }));
        $object->getPluginManager()->set('forward', $stub);
    }
}
