<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class GameSecretSantaTest extends TestCase
{
    public function testClassHasPlayFunction(): void
    {
        $this->assertTrue(
            method_exists(GameSecretSanta::class, 'play'),
            "Class doesn't have method play"
        );
    }
}