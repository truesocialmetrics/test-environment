<?php

namespace Test\Framework\Environment\Configuration;

use PHPUnit_Framework_TestCase;
use Test\Framework\Environment\Stub\ServiceManager\ServiceManager as ServiceManagerMock;

class ServiceLocatorTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $observer = $this->getMockBuilder('Zend\Mvc\Controller\AbstractController')
                     ->disableOriginalConstructor()
                     ->getMock();
        $observer->expects($this->once())
                         ->method('setServiceLocator')
                         ->with($this->equalTo(new ServiceManagerMock()));

        $service = new ServiceLocator();
        $service->configure($observer);
    }
}