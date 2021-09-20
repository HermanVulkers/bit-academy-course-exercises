<?php

$activiteiten = readline('Hoeveel activiteiten wil je op je bucketlist toevoegen? ');
$array = [];

if (is_numeric($activiteiten) == false) {
    exit("Dit is geen getal." . PHP_EOL);
} else {
    for ($i = 1; $i <= $activiteiten; $i++) {
        $activiteit = readline('Vul een activiteit in: ');
        array_push($array, $activiteit);
    }
}
print_r($array);
