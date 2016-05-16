<?php

namespace Test\Framework\Environment\Configuration\PluginManager;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;

class Layout implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        $mock = $this->getTestCase()->getMockBuilder('Zend\Mvc\Controller\Plugin\Layout')
                     ->disableOriginalConstructor()
                     ->getMock();

        foreach ($options as $method => $value) {
            $mock->expects($this->getTestCase()->any())
                 ->method($method)
                 ->with($value);
        }
        $object->getPluginManager()->set('layout', $mock);
    }
}