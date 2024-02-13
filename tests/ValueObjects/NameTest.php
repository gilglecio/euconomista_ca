<?php

use Domain\ValueObjects\Name;

class NameTest extends \PHPUnit\Framework\TestCase
{
    public function test_clear_name(): void
    {
        $this->assertEquals('abcdef g', (new Name('a|"bc!@£de^&$f g'))->value());
        $this->assertEquals('maria silva', (new Name('     maria   silva  '))->value());
    }
}