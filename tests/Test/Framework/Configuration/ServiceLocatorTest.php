<?php

namespace Test\Framework\Environment\Configuration;

use PHPUnit\Framework\TestCase;
use Test\Framework\Environment\Stub\ServiceManager\ServiceManager as ServiceManagerMock;

require_once __DIR__ . '/_files/ServiceLocatorAwareMock.php';

class ServiceLocatorTest extends TestCase
{
    public function test()
    {
        $observer = $this->getMockBuilder('Test\Framework\Environment\Configuration\ServiceLocatorAwareMock')
                     ->disableOriginalConstructor()
                     ->getMock();

        $observer->expects($this->once())
                         ->method('setServiceLocator')
                         ->with($this->equalTo(new ServiceManagerMock()));

        $service = new ServiceLocator();
        $service->configure($observer);
    }
}