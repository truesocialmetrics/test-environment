<?php

namespace Test\Framework\Environment\Builder;

use PHPUnit_Framework_TestCase;

include_once __DIR__ . '/_files/controller-stub.php';

class ControllerTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $observer = new ControllerStub();
        $service = new Controller($this);
        $service->build($observer, []);
        //$this->assertInstanceOf('Test\Framework\Environment\Stub\ServiceManager\ServiceManager', $observer->getServiceLocator());
        $this->assertInstanceOf('Test\Framework\Environment\Stub\Mvc\Controller\PluginManager', $observer->getPluginManager());
        $this->assertInstanceOf('Zend\Http\PhpEnvironment\Request', $observer->getRequest());
        $this->assertInstanceOf('Zend\Http\PhpEnvironment\Response', $observer->getResponse());
        // servicelocator
        //$this->assertInstanceOf('Test\Framework\Environment\Stub\Di\Di', $observer->getServiceLocator()->get('di'));
        //$this->assertInstanceOf('Zend\Config\Config', $observer->getServiceLocator()->get('config'));
        //$this->assertInstanceOf('Zend\Session\Container', $observer->getServiceLocator()->get('Zend\Session\Container'));
    }
}