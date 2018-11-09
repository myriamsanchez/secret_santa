<?php
declare(strict_types=1);

namespace Tests;

require_once(__DIR__ . "/../src/InputSecretSanta.php");

use PHPUnit\Framework\TestCase;
use SecretSanta\InputSecretSanta;

final class InputSecretSantaTest extends TestCase
{
    public function testClassHasReadMethod() : void
    {
        $this->assertTrue(
            method_exists(InputSecretSanta::class, 'read'),
            "Class doesn't have method read"
        );
    }

    public function testReadInputDataIsCorrect()
    {
        $input = new InputSecretSanta();

        $participants   = $input->read();
        $expected       = array_unique($participants);

        $this->assertTrue(
            is_array($participants)
        );

        $this->assertTrue(
            $participants === $expected
        );
    }
}