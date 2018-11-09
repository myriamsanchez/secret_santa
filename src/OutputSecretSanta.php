<?php
namespace SecretSanta;

include_once('Contracts/Output.php');

use SecretSanta\Contracts\Output;

class OutputSecretSanta implements Output
{
    public function printLine(string $line)
    {
        echo $line . "\n";
    }
}