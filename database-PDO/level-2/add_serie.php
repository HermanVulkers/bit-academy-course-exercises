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
	$rating = $_POST['rating'];
	$awards = $_POST['awards'] === "ja" ? 1 : 0;
	$seasons = $_POST['seasons'];
	$country = $_POST['country'];
	$language = $_POST['language'];
	$description = $_POST['description'];

	// TOEVOEGEN AAN DATABASE
	$sql = "INSERT INTO series (title, rating, `description`, has_won_awards, seasons, country, `language`) VALUES (?, ?, ?, ?, ?, ?, ?) ";
	$stmt= $pdo->prepare($sql);
	
	$stmt->bindValue(1, $title);
	$stmt->bindValue(2, (int)$rating, PDO::PARAM_INT);
	$stmt->bindValue(3, $description);
	$stmt->bindValue(4, (int)$awards, PDO::PARAM_INT);
	$stmt->bindValue(5, (int)$seasons, PDO::PARAM_INT);
	$stmt->bindValue(6, $country);
	$stmt->bindValue(7, $language);

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
    <h1>Nieuwe serie</h1>

    <form action="" method="POST">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="" required><br><br>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" value="" required><br><br>

        <label for="awards">Awards:</label>
		<select name="awards" id="awards" required>
			<option value="ja">Ja</option>
			<option value="nee">Nee</option>
        </select><br><br>
        
        <label for="seasons">Seasons:</label>
		<input type="number" name="seasons" id="seasons" value="" required>
		<br><br>

        <label for="country">Country of release:</label>
		<input type="text" id="country" name="country" value=""><br><br>

        <label for="language">Language:</label>
		<select name="language" id="language" required>
			<option value="NL">NL</option>
			<option value="EN">EN</option>
        </select><br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="5" cols="40" required></textarea><br><br>

        <input type="submit" value="Update" name="update">

    </form>
             
</body>

</html>
