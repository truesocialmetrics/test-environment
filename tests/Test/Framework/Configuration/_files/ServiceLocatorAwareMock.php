<?php

namespace Test\Framework\Environment\Configuration;


class ServiceLocatorAwareMock
{
    protected $locator = null;

    public function setServiceLocator($locator)
    {
        $this->locator = $locator;
    }

    public function getServiceLocator()
    {
        return $this->locator;
    }
}