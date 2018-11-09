<?php
declare(strict_types=1);

namespace Tests;

require_once(__DIR__ . "/../src/GameSecretSanta.php");

use PHPUnit\Framework\TestCase;
use SecretSanta\GameSecretSanta;

final class GameSecretSantaTest extends TestCase
{
    public function testClassHasPlayFunction(): void
    {
        $this->assertTrue(
            method_exists(GameSecretSanta::class, 'play'),
            "Class doesn't have method play"
        );
    }

    public function testLisHasExpectedFormat(): void
    {
        $game = new GameSecretSanta();

        $list = [
            'Juan' => 'Luisa',
            'Luisa' => 'Pedro'
        ];

        $receivedList = $game->prepareSecretSantaList($list);
        $expectedOutput = [
            'Juan -> Luisa',
            'Luisa -> Pedro'
        ];
        $this->assertTrue(
            $receivedList === $expectedOutput
        );
    }
}