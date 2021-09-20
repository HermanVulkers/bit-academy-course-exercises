<?php

$input = readline('hoeveel vrienden zal ik vragen om hun dromen? ');
if (is_numeric($input) != 1) {
    echo 'dit is geen getal, probeer het opnieuw';
    exit;
} else if ($input < 0) {
    echo 'geen juist aantal';
    exit;
}

$bucketList = array();

for ($i = 0; $i < $input; $i++) {
    $naam = (string) readLine('Wat is jouw naam? ');
    $droom = (string) readline('wat is jouw droom? ');
    $bucketList += [$naam => $droom];
}

foreach ($bucketList as $persoon => $droom) {
    echo "de droom van $persoon is $droom" . PHP_EOL;
}
