<?php

$albums = [];
$albums += ['Bleach' => '25'];
$albums += ['Nevermind' => '30'];
$albums += ['In Utero' => '28'];
$albums += ['MTV Unplugged' => '44'];

$totaal = array_sum($albums);
$average = array_sum($albums) / count($albums);

echo 'Het albumoverzicht:' . PHP_EOL;
foreach ($albums as $album => $value) {
    echo $album . ' kost €' . $value . PHP_EOL;
}
echo 'De totaal prijs van alle albums kost €' . $totaal . PHP_EOL;
echo 'De gemiddelde prijs van de albums kost €' . $average . PHP_EOL;
