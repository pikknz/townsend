<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Townsend\Security\Validator;

class ValidatorTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testBasicTest()
    {
        $this->assertTrue(Validator::isValidName("Noel"));
        $this->assertFalse(Validator::isValidName("Noel."));
    }
}
