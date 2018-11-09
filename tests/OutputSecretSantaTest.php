<?php
declare(strict_types=1);

namespace Tests;

require_once(__DIR__ . "/../src/OutputSecretSanta.php");

use PHPUnit\Framework\TestCase;
use SecretSanta\OutputSecretSanta;

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