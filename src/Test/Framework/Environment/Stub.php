<?php

namespace Test\Framework\Environment;

use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;
use PHPUnit\Framework\MockObject\Generator\Generator as MockGenerator;

class Stub
{
    use ConfigurationTestCaseTrait;

    const FIELD_CLASS = 'class';
    const FIELD_METHODS = 'methods';

    public function build($options)
    {
        $options = array_merge([
            self::FIELD_METHODS => [],
        ], $options);

        $stub = (new MockGenerator)->testDouble(
            $options[self::FIELD_CLASS],
            true,
            false,
            callOriginalConstructor: false,
            callOriginalClone: false,
            cloneArguments: false,
            allowMockingUnknownTypes: false,
        );

        foreach ($options[self::FIELD_METHODS] as $method => $return) {
            $stub->method($method)->willReturn($return);
        }

        return $stub;
    }
}