<?php

$operator = readline('+, - of %? ');

if ($operator != '+' && $operator != '-' && $operator != '%') {
	echo 'geen geldige operatie' . PHP_EOL;
	exit;
}

$firstNumber = readline('eerste nummer ');
if (is_numeric($firstNumber) != 1) {
	echo "geen getal" . PHP_EOL;
	exit;
}

$secondNumber =  readline('tweede nummer ');
if (is_numeric($secondNumber) != 1) {
	echo 'geen getal' . PHP_EOL;
	exit;
}

if ($operator == '+') {
	$answer = $firstNumber + $secondNumber;
} else if ($operator == '-') {
	$answer = $firstNumber - $secondNumber;
} else if ($operator == '%') {
	$answer = $firstNumber % $secondNumber;
} else {
	echo 'onjuiste operator, gebruik - of +' . PHP_EOL;
}
echo "$answer" . PHP_EOL;
