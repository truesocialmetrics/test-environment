<?php

namespace Test\Framework\Environment\Configuration\ServiceLocator;

use Test\Framework\Environment\Configuration\ConfigurationInterface;
use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;
use Test\Framework\Environment\Stub as EnvironmentStub;

class Stub implements ConfigurationInterface
{
    use ConfigurationTestCaseTrait;

    const FIELD_CLASS = EnvironmentStub::FIELD_CLASS;
    const FIELD_ALIAS = 'alias';

    public function configure($object, array $options = [])
    {
        $options = array_merge([
            self::FIELD_ALIAS   => $options[self::FIELD_CLASS],
        ], $options);
        $stub = (new EnvironmentStub($this->getTestCase()))->build($options);
        $object->getServiceLocator()->set($options[self::FIELD_CLASS], $stub);
        $object->getServiceLocator()->set($options[self::FIELD_ALIAS], $stub);
    }
}