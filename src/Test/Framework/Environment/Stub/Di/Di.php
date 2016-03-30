<?php

namespace Test\Framework\Environment\Stub\Di;

use InvalidArgumentException;
use Zend\Di\Di as ZendDiDi;

class Di extends ZendDiDi
{
    private $mapping = [];

    public function newInstance($name, array $params = [])
    {
        return $this->get($name, $params);
    }

    public function has($name, array $params = [])
    {
        return array_key_exists($this->getMappingKey($name, $params), $this->mapping);
    }

    public function get($name, array $params = [])
    {
        if (!$this->has($name, $params)) {
            throw new InvalidArgumentException('unknow plugin "' . $name . '"');
        }

        return $this->mapping[$this->getMappingKey($name, $params)];
    }

    public function set($name, $params, $value)
    {
        $this->mapping[$this->getMappingKey($name, $params)] = $value;
    }

    protected function getMappingKey($name, $params)
    {
        return $name . '-'. md5(serialize($params));
    }
}