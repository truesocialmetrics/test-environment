<?php

namespace Test\Framework\Environment\Builder;

use Test\Framework\Environment\Builder;

class Controller extends Builder
{
    public function build($controller, $configurations)
    {
        $configurations = array_merge([
            ['name' => 'Request'],
            ['name' => 'Response'],
            // ['name' => 'ServiceLocator'],
            // ['name' => 'ServiceLocator|Di'],
            // ['name' => 'ServiceLocator|Laminas\Session\Container'],
            // ['name'    => 'ServiceLocator|Stub',
            //  'options' => [
            //     'class' => 'Laminas\Config\Config',
            //     'alias' => 'config',
            // ], ],
            ['name' => 'PluginManager'],
            ['name' => 'PluginManager|Forward'],
            ['name' => 'PluginManager|Redirect'],
            ['name' => 'PluginManager|Layout'],
        ], $configurations);

        return parent::build($controller, $configurations);
    }
}
