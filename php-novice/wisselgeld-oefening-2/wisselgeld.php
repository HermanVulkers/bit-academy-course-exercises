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
function inputValidatie($input)
{
    if ($input == 0) {
        echo 'Geen wisselgeld' . PHP_EOL;
    }
    if (is_numeric($input) == false || $input[1] == '') {
        echo 'Dit is geen geldige input' . PHP_EOL;
    }
}

$bedrag = $argv[1];
$restbedrag = $bedrag;
foreach (MONEY_UNITS as $unit) {
    if ($restbedrag >= $unit) {
        $aantal = floor($restbedrag / $unit);
        $restbedrag = $restbedrag % $unit;
        echo $aantal . ' x ' . $unit . ' euro' . PHP_EOL;
    }
}

$heleGetalZonderDecimalen = floor($bedrag); // bijv. 254
$centenFractie = $bedrag - $heleGetalZonderDecimalen; // bijv. 0.33000001
$centenTotaal = round($centenFractie, 2) * 100; // bijv 0.33 x 100 = 33
$centenAfgerondVijfen = round($centenTotaal / 5) * 5; // bijv. 33/5 = 6,6 wordt afgerond naar -> 7, 7 * 5 = 35

foreach (MONEY_UNITS as $unit) {
    if ($centenAfgerondVijfen >= $unit) {
        $aantal = floor($centenAfgerondVijfen / $unit);
        $centenAfgerondVijfen = $centenAfgerondVijfen % $unit;
        echo $aantal . ' x ' . $unit . ' cent' . PHP_EOL;
    }
}
