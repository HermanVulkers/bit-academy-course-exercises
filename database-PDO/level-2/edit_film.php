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
	$id = $_POST['id'];
	$title = $_POST['title'];
	$duration = $_POST['duration']; 
	$date = $_POST['date'];
	$country = $_POST['country'];
	$description = $_POST['description'];
	$idtrailer = $_POST['idtrailer'];

	// UPDATE DATABASE
	$sql = "UPDATE films 
	SET
		titel = ?,
		duur = ?,
		datumuitkomst = ?,
		landuitkomst = ?,
		omschrijving = ?,
		idtrailer = ?
	WHERE ID = ? ";

	$stmt = $pdo->prepare($sql);
	
	$stmt->bindValue(1, $title);
	$stmt->bindValue(2, (int)$duration, PDO::PARAM_INT);
	$stmt->bindValue(3, $date);
	$stmt->bindValue(4, $country);
	$stmt->bindValue(5, $description);
	$stmt->bindValue(6, $idtrailer);
	$stmt->bindValue(7, $id);

	$stmt->execute();

	// TERUG NAAR HOOFDPAGINA
	header('location: index.php');
	exit;
} 

// RIJ SELECTEREN EN DETAILS FETCHEN
$id = $_GET['ID'];
$sql = $pdo->prepare("SELECT * FROM films WHERE id=?");
$sql->execute([$id]);
$details = $sql->fetch();

// HUIDIGE DETAILS VOOR GEBRUIK DEFAULT VALUES IN HTML FORM
$country_current = $details['landuitkomst'];
$date_current = $details['datumuitkomst'];

?>

<!DOCTYPE html>

<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Films wijzigen</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>

     </style>
</head>

<body>
	
    <br>
    <a href="index.php">Terug</a>
    <h1><?= $details['titel']; ?> - <?= $details['duur']; ?> minuten</h1>

    <form action="" method="POST">

		<input type="hidden" name="id" value="<?= $id ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= $details['titel'] ?>"><br><br>

        <label for="rating">Duration:</label>
        <input type="number" id="rating" name="duration" value="<?= $details['duur'] ?>"><br><br>

		<label for="datum">Date release:</label>
		<input type="date" name="date" id="date" value="<?= $details['datumuitkomst'] ?>" required>
		<br><br>

        <label for="country">Country:</label>
        <select name="country" id="country">
			<option value="NL"<?= $country_current == "NL" ? 'selected' : '' ?>>NL</option>
			<option value="VS"<?= $country_current == "VS" ? 'selected' : '' ?>>VS</option>
        </select><br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="5" cols="40"><?= $details['omschrijving'] ?></textarea><br><br>

		<label for="title">Trailer ID:</label>
        <input type="text" id="idtrailer" name="idtrailer" value="<?= $details['idtrailer'] ?>"><br><br>

        <input type="submit" value="Update" name="update">

    </form>
             
</body>

</html>
