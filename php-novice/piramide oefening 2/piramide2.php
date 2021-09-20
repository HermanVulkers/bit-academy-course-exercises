<?php

$stapels = readline('Hoeveel stapels wil je hebben? ') . PHP_EOL;
$x1 = "*";

for ($x = 1; $x <= $stapels; $x++) {
    echo $x1 . "\n";
    $x1 .= '*';
}
