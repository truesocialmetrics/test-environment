<?php

namespace Test\Framework\Environment\Configuration\ServiceLocator;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;
use Zend\Cache\Storage\Adapter\Memory as CacheStorageAdapterMemory;
use Zend\Session;

class ZendSessionContainer implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    public function configure($object, array $options = [])
    {
        $manager = new Session\SessionManager();
        $manager->setStorage(new Session\Storage\ArrayStorage());
        $manager->setSaveHandler(new Session\SaveHandler\Cache(new CacheStorageAdapterMemory()));
        $manager->setConfig(new Session\Config\StandardConfig());
        $session = new Session\Container('Default', $manager);

        $object->getServiceLocator()->set('Zend\Session\Container', $session);
    }
}