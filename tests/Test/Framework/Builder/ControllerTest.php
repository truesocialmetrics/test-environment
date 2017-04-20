<?php

namespace Test\Framework\Environment\Builder;

use PHPUnit\Framework\TestCase;

include_once __DIR__ . '/_files/controller-stub.php';

class ControllerTest extends TestCase
{
    public function test()
    {
        $observer = new ControllerStub();
        $service = new Controller($this);
        $service->build($observer, []);
        $this->assertInstanceOf('Test\Framework\Environment\Stub\Mvc\Controller\PluginManager', $observer->getPluginManager());
        $this->assertInstanceOf('Zend\Http\PhpEnvironment\Request', $observer->getRequest());
        $this->assertInstanceOf('Zend\Http\PhpEnvironment\Response', $observer->getResponse());
    }
}