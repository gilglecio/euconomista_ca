<?php

use Domain\ValueObjects\UnsignedInteger;

class UnsignedIntegerTest extends \PHPUnit\Framework\TestCase
{
    public function test_signed_integer(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new UnsignedInteger(-1);
    }

    public function test_zero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new UnsignedInteger(0);
    }

    public function test_unsigned_integer(): void
    {
        $value = new UnsignedInteger(1);
        $this->assertEquals(1, $value->value());
    }
}