<?php

namespace Test\Framework\Environment\Configuration\PluginManager;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;

class Redirect implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        $stub = $this->getTestCase()->getMockBuilder('Laminas\Mvc\Controller\Plugin\Redirect')
                     ->disableOriginalConstructor()
                     ->getMock();

        $stub->method('toUrl')
             ->will($this->getTestCase()->returnCallback(function () {
                return func_get_args();
             }));
        $stub->method('toRoute')
            ->will($this->getTestCase()->returnCallback(function () {
                return func_get_args();
            }));

        $object->getPluginManager()->set('redirect', $stub);
    }
}
