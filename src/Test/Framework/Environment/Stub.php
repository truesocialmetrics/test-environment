<?php

namespace Test\Framework\Environment;

use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;

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
        $stub = $this->getTestCase()->getMockBuilder($options[self::FIELD_CLASS])
                     ->disableOriginalConstructor()
                     ->getMock();
        foreach ($options[self::FIELD_METHODS] as $method => $value) {
            $stub->method($method)
                 ->willReturn($value);
        }

        return $stub;
    }
}