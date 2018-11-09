<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class RandomSecretSantaTest extends TestCase
{
    public function testClassHasGenerateFunction(): void
    {
        $this->assertTrue(
            method_exists(RandomSecretSanta::class, 'generate'),
            "Class doesn't have method generate"
        );
    }
}