<?php
declare(strict_types=1);

namespace Tests;

require_once(__DIR__ . "/../src/RandomSecretSanta.php");

use PHPUnit\Framework\TestCase;
use SecretSanta\RandomSecretSanta;

final class RandomSecretSantaTest extends TestCase
{
    public function testClassHasGenerateFunction(): void
    {
        $this->assertTrue(
            method_exists(RandomSecretSanta::class, 'generate'),
            "Class doesn't have method generate"
        );
    }

    public function testGeneratedNumberIsInRange(): void
    {
        $randomObj = new RandomSecretSanta();

        $number = $randomObj->generate(0,5);

        $this->assertGreaterThanOrEqual(0,$number, "generated number is lower than expected");
        $this->assertLessThanOrEqual(5, $number, "generated number is bigger than expected");
    }
}