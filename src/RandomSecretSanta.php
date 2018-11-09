<?php

namespace SecretSanta;

include_once('Contracts\Random.php');

use SecretSanta\Contracts\Random;

class RandomSecretSanta implements Random
{

    public function generate(int $min, int $max): int
    {
        return rand($min, $max);
    }
}