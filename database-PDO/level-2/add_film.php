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
} catch (PDOException $e) {
	throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// ALS FORM GESUBMIT IS -> IF BLOCK RUNNEN
if (isset($_POST['update'])) {
	// POST VALUES TOEWIJZEN
	$title = $_POST['title'];
	$duration = $_POST['duration']; 
	$date = $_POST['date'];
	$country = $_POST['country'];
	$description = $_POST['description'];
	$idtrailer = $_POST['idtrailer'];

	// TOEVOEGEN AAN DATABASE
	$sql = "INSERT INTO films (titel, duur, datumuitkomst, landuitkomst, omschrijving, idtrailer) VALUES (?, ?, ?, ?, ?, ?) ";
	$stmt= $pdo->prepare($sql);
	
	$stmt->bindValue(1, $title);
	$stmt->bindValue(2, (int)$duration, PDO::PARAM_INT);
	$stmt->bindValue(3, $date);
	$stmt->bindValue(4, $country);
	$stmt->bindValue(5, $description);
	$stmt->bindValue(6, $idtrailer);

	$stmt->execute();

	// TERUG NAAR HOOFDPAGINA
	header('location: index.php');
	exit;
} 

?>

<!DOCTYPE html>

<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Serie toevoegen</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>

     </style>
</head>

<body>
	
    <br>
    <a href="index.php">Terug</a>
    <h1>Nieuwe film</h1>

    <form action="" method="POST">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value=""><br><br>

        <label for="rating">Duration:</label>
        <input type="number" id="rating" name="duration" value=""><br><br>

		<label for="datum">Date of release:</label>
		<input type="date" name="date" id="date" value="" required>
		<br><br>

        <label for="country">Country of release:</label>
		<input type="text" id="country" name="country" value=""><br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="5" cols="40"></textarea><br><br>

		<label for="title">Youtube trailer ID:</label>
        <input type="text" id="idtrailer" name="idtrailer" value=""><br><br>

        <input type="submit" value="Update" name="update">

    </form>
             
</body>

</html>
