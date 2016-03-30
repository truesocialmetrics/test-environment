<?php

namespace Test\Framework\Environment\Configuration;

use Test\Framework\Environment\Stub\ServiceManager\ServiceManager as ServiceManagerMock;

class ServiceLocator implements ConfigurationInterface
{
    public function configure($object, array $options = [])
    {
        $object->setServiceLocator(new ServiceManagerMock());
    }
}