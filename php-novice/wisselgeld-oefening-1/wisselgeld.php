<?php

$wisselgeld = $argv[1];

if ($wisselgeld == 0 || $wisselgeld == '') {
    echo 'Geen wisselgeld' . PHP_EOL;
} else {
    $wisselgeld_int = intval($wisselgeld);

    $aantaltien = floor($wisselgeld_int / 10);
    if ($wisselgeld_int >= 10) {
        echo $aantaltien . ' x ' . 10 . ' euro' . PHP_EOL;
    }

    $restbedragna10 = $wisselgeld_int % 10;

    $aantalvijf = floor($restbedragna10 / 5);
    if ($restbedragna10 >= 5) {
        echo $aantalvijf . ' x ' . 5 . ' euro' . PHP_EOL;
    }

    $restbedragna5 = $restbedragna10 % 5;

    $aantaltwee = floor($restbedragna5 / 2);
    if ($restbedragna5 >= 2) {
        echo $aantaltwee . ' x ' . 2 . ' euro' . PHP_EOL;
    }

    $restbedragna2 = $restbedragna5 % 2;

    $aantaleen = floor($restbedragna2 / 1);
    if ($restbedragna2 >= 1) {
        echo $aantaleen . ' x ' . 1 . ' euro' . PHP_EOL;
    }
}
