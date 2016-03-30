<?php

namespace Test\Framework\Environment\Configuration\ServiceLocator;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;
use Test\Framework\Environment\Stub\Di\Di as DiMock;

class Di implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        $object->getServiceLocator()->set('di', new DiMock());
    }
}