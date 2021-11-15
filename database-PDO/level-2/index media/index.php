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


	$series = $pdo->query("SELECT * FROM media WHERE mediatype = 'serie'");

	$films = $pdo->query("SELECT * FROM media WHERE mediatype = 'film'");


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

		<h1>Welcome to the Netland admin panel</h1>
		<h2>Series</h2>

		<table>
			<tr>
				<th><u>Title</u></th>
				<th><u>Rating</u></th>
				<th><u>Description</u></th>
				<th><u>Awards</u></th>
				<th><u>Duration</u></th>
				<th><u>Releasedate</u></th>
				<th><u>Seasons</u></th>
				<th><u>Country of release</u></th>
				<th><u>Language</u></th>
				<th><u>Trailer ID</u></th>
			</tr>

			<?php while ($series_row = $series->fetch()) { ?>
				<tr>
					<td><?php echo $series_row['title']; ?></td>
					<td><?php echo $series_row['rating']; ?></td>
					<td><?php echo $series_row['description']; ?></td>
					<td><?php echo $series_row['awards']; ?></td>
					<td><?php echo $series_row['duration']; ?></td>
					<td><?php echo $series_row['releasedate']; ?></td>
					<td><?php echo $series_row['seasons']; ?></td>
					<td><?php echo $series_row['country']; ?></td>
					<td><?php echo $series_row['lang']; ?></td>
					<td><?php echo $series_row['trailerid']; ?></td>
					<td><a href="edit.php?id=<?php echo $series_row['id']; ?>"><button>Edit</button><a></td>

				</tr>
			<?php } ?>

		</table>
		<h2>Films</h2>

		<table>
		<tr>
				<th><u>Title</u></th>
				<th><u>Rating</u></th>
				<th><u>Description</u></th>
				<th><u>Awards</u></th>
				<th><u>Duration</u></th>
				<th><u>Releasedate</u></th>
				<th><u>Seasons</u></th>
				<th><u>Country of release</u></th>
				<th><u>Language</u></th>
				<th><u>Trailer ID</u></th>
			</tr>

			<?php while ($films_row = $films->fetch()) { ?>
				<tr>
					<td><?php echo $films_row['title']; ?></td>
					<td><?php echo $films_row['rating']; ?></td>
					<td><?php echo $films_row['description']; ?></td>
					<td><?php echo $films_row['awards']; ?></td>
					<td><?php echo $films_row['duration']; ?></td>
					<td><?php echo $films_row['releasedate']; ?></td>
					<td><?php echo $films_row['seasons']; ?></td>
					<td><?php echo $films_row['country']; ?></td>
					<td><?php echo $films_row['lang']; ?></td>
					<td><?php echo $films_row['trailerid']; ?></td>
					<td><a href="edit.php?id=<?php echo $films_row['id']; ?>"><button>Edit</button><a></td>

				</tr>
			<?php } ?>
				
		</table>
		<br>
		<a href="insert.php"><button>Add media</button></a><br>

	</div>
</body>

</html>