<?php

$lijstje = readline('Wie zit er in de klas? ');
$array = [];

$array = explode(' ', $lijstje);

echo 'De studenten in de klas zijn: ' . PHP_EOL;
foreach ($array as $key) {
    echo $key . PHP_EOL;
}
