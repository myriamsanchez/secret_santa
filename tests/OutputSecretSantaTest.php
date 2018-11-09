<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class OutputSecretSantaTest extends TestCase
{
    public function testClassHasPrintLineFunction(): void
    {
        $this->assertTrue(
            method_exists(OutputSecretSanta::class, 'printLine'),
            "Class doesn't have method printLine"
        );
    }
}