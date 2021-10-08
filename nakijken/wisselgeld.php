<?php

$input = floatval($argv[1]);
if (! isset($argv[1])) {
    echo "Geen wisselgeld" . PHP_EOL;
    exit;
}

$input = round($input * 100);

if ($input == 0) {
    echo "Geld wisselgeld" . PHP_EOL;
    exit;
}

define('UNITS', array (50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05));

foreach (UNITS as $unit) {
    $unit *= 100;
    if ($input >= $unit) {
        $times = floor($input / $unit);
        $input = $input % $unit;
        if ($unit >= 100) {
            $unit /= 100;
            $currency = 'euro';
        } else {
            $currency = 'cent';
        }
        echo "$times x $unit $currency" . PHP_EOL;
    }
}