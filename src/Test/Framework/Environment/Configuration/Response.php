<?php

namespace Test\Framework\Environment\Configuration;

use ReflectionClass;
use Zend\Http\PhpEnvironment\Response as HttpEnvironmentRequest;
use Zend\Stdlib\Parameters;

class Response implements ConfigurationInterface
{
    public function configure($object, array $options = [])
    {
        $reflectionClass = new ReflectionClass($object);
        $reflectionProperty = $reflectionClass->getProperty('response');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($object, new HttpEnvironmentRequest());

        foreach ($options as $method => $parameters) {
            $methodName = 'set' . ucfirst($method);
            $object->getResponse()->{$methodName}(is_array($parameters) ? new Parameters($parameters) : $parameters);
        }
    }
}