<?php

namespace Test\Framework\Environment\Configuration;

use ReflectionClass;
use Zend\Http\PhpEnvironment\Request as HttpEnvironmentRequest;
use Zend\Stdlib\Parameters;

class Request implements ConfigurationInterface
{
    public function configure($object, array $options = [])
    {
        $reflectionClass = new ReflectionClass($object);
        $reflectionProperty = $reflectionClass->getProperty('request');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($object, new HttpEnvironmentRequest());

        foreach ($options as $method => $parameters) {
            $methodName = 'set' . ucfirst($method);
            $object->getRequest()->{$methodName}(is_array($parameters) ? new Parameters($parameters) : $parameters);
        }
    }
}