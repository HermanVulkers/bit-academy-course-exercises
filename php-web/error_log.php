<?php

$getal = $argv[1];

function countDown($getal) 
{
    if ($getal < 0 || $getal > 10) {
        throw new Exception("Het getal moet tussen 0 en 10 liggen");
    }
    for ($getal; $getal > 0; $getal--) {
        echo $getal . PHP_EOL;
    }
}

try {
    countdown($getal);
} catch (Exception $error) {
    error_log("Error. Het getal moet tussen 0 en 10 liggen. ", 3, "errors.log");
}
