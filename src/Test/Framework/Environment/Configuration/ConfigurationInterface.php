<?php

namespace Test\Framework\Environment\Configuration;

interface ConfigurationInterface
{
    public function configure($object, array $options = []);
}