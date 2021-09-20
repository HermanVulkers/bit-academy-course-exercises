<?php

$quiz = [];
$quiz += ['Japan' => 'Tokyo'];
$quiz += ['Mexico' => 'Mexico City'];
$quiz += ['USA' => 'Washington D.C.'];
$quiz += ['India' => 'New Delhi'];
$quiz += ['Zuid-Korea' => 'Seoul'];
$quiz += ['China' => 'Peking'];
$quiz += ['Nigeria' => 'Abuja'];
$quiz += ['Argentina' => 'Buenos Aires'];
$quiz += ['Egypt' => 'Cairo'];
$quiz += ['UK' => 'London'];

$score = 0;
$count = count($quiz);

foreach ($quiz as $key => $value) {
    $antwoord = readline('Welke hoofdstad heeft: ' . $key . '?');
    if ($antwoord == $value) {
        echo 'Correct!' . PHP_EOL;
        $score++;
    } else {
        echo 'Helaas, ' . $antwoord . ' is niet de hoofdstad van ' . $key . PHP_EOL;
    }
}
echo 'Je hebt ' . $score . ' van de ' . $count . ' goed geraden!' . PHP_EOL;
