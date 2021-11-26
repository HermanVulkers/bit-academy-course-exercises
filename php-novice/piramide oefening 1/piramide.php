<?php

$stapels = readline('Hoeveel stapels wil je hebben? ') . PHP_EOL;

for ($x = 0; $x <= $stapels; $x++) {
	for ($z = 0; $z <= $x; $z++) {
		echo '*';
	}
	echo PHP_EOL;
}
