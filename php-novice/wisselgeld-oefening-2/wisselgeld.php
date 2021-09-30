<?php

define('MONEY_UNITS', array(
    50,
    20,
    10,
    5,
    2,
    1,
));

$input = $argv[1];
inputValidatie($input);
try {
    function inputValidatie($input)
    {
        if (is_numeric($input) == false || $input <= 0) {
            throw new Exception("Geen geldige input want geen positief getal");
        }
    }
} catch (Exception $error) {
    echo "Error opgevangen: " . $error->getMessage();
}

$bedrag = $argv[1];
berekenEuros($bedrag);
function berekenEuros($bedrag)
{
    $restbedrag = $bedrag;
    foreach (MONEY_UNITS as $unit) {
        if ($restbedrag >= $unit) {
            $aantal = floor($restbedrag / $unit);
            $restbedrag = $restbedrag % $unit;
            echo $aantal . ' x ' . $unit . ' euro' . PHP_EOL;
        }
    }
}

afrondingCenten($bedrag);
function afrondingCenten($bedrag)
{
    $heleGetalZonderDecimalen = floor($bedrag); // bijv. 254
    $centenFractie = $bedrag - $heleGetalZonderDecimalen; // bijv. 0.33000001
    $centenTotaal = round($centenFractie, 2) * 100; // bijv 0.33 x 100 = 33
    $centenAfgerondVijfen = round($centenTotaal / 5) * 5; // bijv. 33/5 = 6,6 wordt afgerond naar -> 7, 7 * 5 = 35
    return $centenAfgerondVijfen;
}
$centenAfgerondVijfen = afrondingCenten($bedrag);

berekenCenten($centenAfgerondVijfen);
function berekenCenten($centenAfgerondVijfen)
{
    foreach (MONEY_UNITS as $unit) {
        if ($centenAfgerondVijfen >= $unit) {
            $aantal = floor($centenAfgerondVijfen / $unit);
            $centenAfgerondVijfen = $centenAfgerondVijfen % $unit;
            echo $aantal . ' x ' . $unit . ' cent' . PHP_EOL;
        }
    }
}
