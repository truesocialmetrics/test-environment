<?php

namespace Test\Framework\Environment\Configuration;

use Test\Framework\Environment\Stub\Mvc\Controller\PluginManager as PluginManagerMock;

class PluginManager implements ConfigurationInterface
{
    public function configure($object, array $options = [])
    {
        $object->setPluginManager(new PluginManagerMock());
    }
}