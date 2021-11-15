<?php

$host = 'localhost';
$db   = 'netland';
$user = 'bit_academy';
$pass = 'bit_academy';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
	$pdo = new PDO($dsn, $user, $pass, $options);
	echo "Connection succesful.";

	$series_columns = array('title', 'rating');
	if (isset($_GET['series_column']) && in_array($_GET['series_column'], $series_columns)) {
		$series_column =  $_GET['series_column'];
	} else {
		$series_column = $series_columns[0];
	}
	$series_sort_order = isset($_GET['series_order']) && strtolower($_GET['series_order']) == 'desc' ? 'DESC' : 'ASC';

	$series_result = $pdo->query('SELECT * FROM series ORDER BY ' .  $series_column . ' ' . $series_sort_order);
	$series_asc_or_desc = $series_sort_order == 'ASC' ? 'desc' : 'asc';

	$films_columns = array('titel', 'duur');
	if (isset($_GET['films_column']) && in_array($_GET['films_column'], $films_columns)) {
		$films_column =  $_GET['films_column'];
	} else {
		$films_column = $films_columns[0];
	}
	$films_sort_order = isset($_GET['films_order']) && strtolower($_GET['films_order']) == 'desc' ? 'DESC' : 'ASC';

	$films_result = $pdo->query('SELECT * FROM films ORDER BY ' .  $films_column . ' ' . $films_sort_order);
	$films_asc_or_desc = $films_sort_order == 'ASC' ? 'desc' : 'asc';
} catch (PDOException $e) {
	throw new PDOException($e->getMessage(), (int)$e->getCode());
}

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Netland</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<style>

	</style>
</head>

<body>
	<div class="container">

		<h1>Welkom op het Netland beheerders paneel</h1>
		<h2>Series</h2>

		<table>
			<tr>
				<th><a href="index.php?series_column=title&series_order=<?= $series_asc_or_desc; ?>&films_column=<?= $films_column; ?>&films_order=<?= $films_sort_order; ?>">Title</a></th>
				<th><a href="index.php?series_column=rating&series_order=<?= $series_asc_or_desc; ?>&films_column=<?= $films_column; ?>&films_order=<?= $films_sort_order; ?>">Rating</a></th>
			</tr>

			<?php while ($series_row = $series_result->fetch()) { ?>
				<tr>
					<td><?php echo $series_row['title']; ?></td>
					<td><?php echo $series_row['rating']; ?></td>

					<td><a href="series.php?ID=<?php echo $series_row['id'] ?>">Meer details<a></td>
					<td><a href="edit_serie.php?ID=<?php echo $series_row['id'] ?>">Wijzig serie<a></td>
				</tr>
			<?php } ?>
			<tr>
				<td><strong><u><a href="add_serie.php">Serie toevoegen<a></u></strong></td>
			</tr>

		</table>
		<h2>Films</h2>

		<table>
			<tr>
				<th><a href="index.php?films_column=titel&films_order=<?= $films_asc_or_desc; ?>&series_column=<?= $series_column; ?>&series_order=<?= $series_sort_order; ?>">Title</a></th>
				<th><a href="index.php?films_column=duur&films_order=<?= $films_asc_or_desc; ?>&series_column=<?= $series_column; ?>&series_order=<?= $series_sort_order; ?>">Duur</a></th>
			</tr>

			<?php while ($films_row = $films_result->fetch()) { ?>
				<tr>
					<td><?php echo $films_row['titel']; ?></td>
					<td><?php echo $films_row['duur']; ?></td>

					<td><a href="films.php?ID=<?php echo $films_row['ID'] ?>">Meer details<a></td>
					<td><a href="edit_film.php?ID=<?php echo $films_row['ID'] ?>">Wijzig film<a></td>

				</tr>
			<?php } ?>

			<td><strong><u><a href="add_film.php">Film toevoegen<a></u></strong></td>

		</table>

	</div>
</body>

</html>