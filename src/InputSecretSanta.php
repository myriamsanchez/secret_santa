<?php

namespace SecretSanta;

require_once('Contracts/Input.php');

use SecretSanta\Contracts\Input;

class InputSecretSanta implements Input
{
    protected $filePath = __DIR__ . '/../players.txt';

    public function read(): array
    {
        $secretSanta = [];

        $file = fopen($this->filePath, "r") or exit("Can't open $this->filePath");
        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            if (($this->isParticipantRepeated(array_map('strtolower',$secretSanta), strtolower($line)))
                || ($this->lineHasMultipleParticipants(strtolower($line)))) {
                echo 'File contains duplicated data or has multiple participants in one line';
                return [];
            }
            $secretSanta[] = $line;
        }
        return $secretSanta;
    }

    protected function isParticipantRepeated(array $list, $participant): bool
    {
        return in_array($participant, $list);
    }

    protected function lineHasMultipleParticipants($line): bool
    {
        $participants = explode(',', $line);
        return (sizeof($participants) !== 1);
    }
}