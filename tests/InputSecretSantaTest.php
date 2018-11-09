<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class InputSecretSantaTest extends TestCase
{
    public function testClassHasReadMethod() : void
    {
        $this->assertTrue(
            method_exists(InputSecretSanta::class, 'read'),
            "Class doesn't have method read"
        );
    }
}