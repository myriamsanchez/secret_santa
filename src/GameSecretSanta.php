<?php
namespace SecretSanta;

require_once ('Contracts/Game.php');
require_once ('InputSecretSanta.php');
require_once ('InputSecretSanta.php');

use SecretSanta\Contracts\Game;

class GameSecretSanta implements Game
{
    public function play()
    {
        $inputObj       = new InputSecretSanta();
        $participants   = $inputObj->read();

        $partnersList   = $this->getPartnersList($participants);
        $this->showSecretSantaList($partnersList);
    }

    public function prepareSecretSantaList($list) : array
    {
        $partners = [];

        foreach ($list as $participant => $partner) {
            $partners[] = $participant . " -> " . $partner;
        }
        return $partners;
    }

    protected function showSecretSantaList($list)
    {
        $outputObj  = new OutputSecretSanta();

        $list = $this->prepareSecretSantaList($list);

        foreach ($list as $line) {

            $outputObj->printLine($line);
        }
    }

    protected function getPossiblePartners(array $list, $participant): array
    {
        $id = array_search($participant, $list);
        if ($id !== false) {
            array_splice($list, $id, 1);
        }
        return $list;
    }

    protected function getPartnersList(array $list)
    {
        $partnersList           = [];
        $unassignedParticipants = $list;
        $randomObj              = new RandomSecretSanta();

        foreach ($list as $participant) {
            $possiblePartners = $this->getPossiblePartners($unassignedParticipants, $participant);

            if (sizeof($possiblePartners) == 0) {
                // there only unassigned partner is the current one
                // switch partners assigned with the first participant
                reset($partnersList);

                $firstParticipant   = key($partnersList);
                $firstAssigned      = reset($partnersList);

                $partnersList[$firstParticipant]    = $participant;
                $partnersList[$participant]         = $firstAssigned;
            } else {
                if (sizeof($possiblePartners) == 1) {
                    $id = 0;
                } else {
                    $id = $randomObj->generate(0, (sizeof($possiblePartners)-1));
                }
                $partnersList[$participant] = $possiblePartners[$id];

                $assignedPartner = array_search($possiblePartners[$id], $unassignedParticipants);
                array_splice($unassignedParticipants, $assignedPartner, 1);
            }
        }
        return $partnersList;
    }
}