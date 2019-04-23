<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Kiwari;

class KiwariTest extends TestCase
{
    public function testA(): void
    {
        $this->assertEquals(
            'user@example.com',
            'user@example.com'
        );
    }

    public function testB(): void
    {
        $this->assertEquals(
            'user@example.com',
            'user@example.com'
        );
    }

    public function testC(): void
    {
        $this->assertEquals(
            'user@example.com',
            'user@example.com'
        );
    }
}