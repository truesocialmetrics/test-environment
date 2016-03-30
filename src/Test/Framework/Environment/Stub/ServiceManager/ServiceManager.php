<?php

namespace Test\Framework\Environment\Stub\ServiceManager;

use InvalidArgumentException;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceManager implements ServiceLocatorInterface
{
    private $mapping = [];

    /**
     * Retrieve a registered instance.
     *
     * @param string $name
     *
     * @throws Exception\ServiceNotFoundException
     *
     * @return object|array
     */
    public function get($name)
    {
        if (!$this->has($name)) {
            throw new InvalidArgumentException('unknow service "' . $name . '"');
        }

        return $this->mapping[$name];
    }

    /**
     * Check for a registered instance.
     *
     * @param string|array $name
     *
     * @return bool
     */
    public function has($name)
    {
        return array_key_exists($name, $this->mapping);
    }

    public function set($name, $stub)
    {
        $this->mapping[$name] = $stub;
    }
}