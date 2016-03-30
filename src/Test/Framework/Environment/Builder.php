<?php

namespace Test\Framework\Environment;

use Test\Framework\Environment\Configuration\ConfigurationTestCaseTrait;

class Builder
{
    use ConfigurationTestCaseTrait;

    const FIELD_NAME = 'name';
    const FIELD_OPTIONS = 'options';

    public function build($controller, $configurations)
    {
        foreach ($configurations as $params) {
            $options = $this->loadConfigurationOptions($params);
            $configuration = $this->loadConfiguration($params);
            $configuration->configure($controller, $options);
        }
    }

    protected function loadConfigurationOptions($params)
    {
        return array_key_exists(self::FIELD_OPTIONS, $params) ? $params[self::FIELD_OPTIONS] : [];
    }

    protected function loadConfiguration($params)
    {
        $name = $params[self::FIELD_NAME];
        $name = str_replace('\\', '', $name);
        $name = str_replace('|', '\\', $name);
        $className = 'Test\Framework\Environment\Configuration\\' . $name;

        return new $className($this->getTestCase());
    }
}