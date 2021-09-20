<?php

$landen = readline('Hoeveel landen ga je toevoegen? ');
$array = [];

if (is_numeric($landen) == false) {
    exit("Dit is geen getal." . PHP_EOL);
} else if ($landen == 0) {
    exit("Dat is geen geldige input." . PHP_EOL);
} else {
    for ($i = 1; $i <= $landen; $i++) {
        $land_key = readline('Welk land wil je toevoegen? ');
        $hoofdstad_value = readline('Wat is de hoofdstad van ' . $land_key . '?');

        $array[$land_key] = $hoofdstad_value;
    }
}
echo 'De volgende landen en steden zitten in de database:' . PHP_EOL;
foreach ($array as $land_key => $hoofdstad_value) {
    echo $land_key . ', ' . $hoofdstad_value . PHP_EOL;
}
