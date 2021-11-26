<?php

$friends = readline('How many friends should we ask for their dreams? ');
$array = [];

if (is_numeric($friends) == false) {
	exit("This is not a number." . PHP_EOL);
}
if ($friends == 0) {
	exit("This is not valid input." . PHP_EOL);
}

for ($i = 1; $i <= $friends; $i++) {
	$name_key = readline('What is your name? ');
	$number_dreams = readline('How many dreams are you going to enter? ');

	if (is_numeric($number_dreams) == false) {
		exit("This is not a number." . PHP_EOL);
	}
	if ($number_dreams == 0) {
		exit("This is not valid input." . PHP_EOL);
	}

	for ($x = 1; $x <= $number_dreams; $x++) {
		$dream_value = readline('What is your dream? ');
		$array[$name_key][] = $dream_value;
	}
}
foreach ($array as $friend => $dreams) {
	foreach ($dreams as $dream) {
		echo ($friend . ' has this as their dream: ' . $dream . PHP_EOL);
	}
}
