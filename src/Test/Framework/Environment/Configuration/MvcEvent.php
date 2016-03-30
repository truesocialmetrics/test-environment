<?php

namespace Test\Framework\Environment\Configuration;

use ReflectionClass;
use Zend\Mvc\MvcEvent as ZendMvcEvent;
use Zend\Stdlib\Parameters;

class MvcEvent implements ConfigurationInterface
{
    public function configure($object, array $options = [])
    {
        $reflectionClass = new ReflectionClass($object);
        $reflectionProperty = $reflectionClass->getProperty('event');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($object, new ZendMvcEvent());

        foreach ($options as $method => $parameters) {
            $methodName = 'set' . ucfirst($method);
            $object->getEvent()->{$methodName}(is_array($parameters) ? new Parameters($parameters) : $parameters);
        }
    }
}