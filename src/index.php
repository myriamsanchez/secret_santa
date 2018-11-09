#!/bin/sh php
<?php
require_once ('InputSecretSanta.php');
require_once ('RandomSecretSanta.php');
require_once ('OutputSecretSanta.php');
require_once ('GameSecretSanta.php');

use SecretSanta\GameSecretSanta;

$game = new GameSecretSanta();
$game->play();

