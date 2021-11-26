<?php
$games = [
	["Call of Duty", "Shooter", 59.95],
	["Rocket League", "Sport", 19.95],
	["Assassins Creed", "RP", 49.95]
];

foreach ($games as $game) {
	$titles[] = $game[0];
	$prices[] = $game[2];
}

echo "Gemiddelde prijs: €" . round(array_sum($prices) / count($games), 2) . PHP_EOL;
echo "Gemiddelde lengte van de titel: " . round(strlen(implode($titles)) / count($games), 0) . " karakters" . PHP_EOL;
