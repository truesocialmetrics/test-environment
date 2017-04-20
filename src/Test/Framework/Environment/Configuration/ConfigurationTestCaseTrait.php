<?php

namespace Test\Framework\Environment\Configuration;

use PHPUnit\Framework\TestCase;

trait ConfigurationTestCaseTrait
{
    private $testCase = null;

    public function setTestCase(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function getTestCase()
    {
        return $this->testCase;
    }

    public function __construct(TestCase $testCase)
    {
        $this->setTestCase($testCase);
    }
}