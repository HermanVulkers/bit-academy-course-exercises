<?php

error_reporting(E_ALL);

$time = $argv[1];
$time_ex = explode(' ', $time);

$totalseconds = 0;

foreach ($time_ex as $input) {
    $lastletter = substr($input, -1);

    switch ($lastletter) {
        case "s":
            $totalseconds += (int) $input;
            break;
        case "m":
            $totalseconds += (int) $input * 60;
            break;
        case "u":
            $totalseconds += (int) $input * 60 * 60;
            break;
        case "d":
            $totalseconds += (int) $input * 60 * 60 * 24;
            break;
    }
}

echo ($totalseconds . " seconden" . PHP_EOL);
