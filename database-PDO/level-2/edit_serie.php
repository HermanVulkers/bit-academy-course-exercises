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
	$rating = $_POST['rating'];
	$awards = $_POST['awards'] === "ja" ? 1 : 0;
	$seasons = $_POST['seasons'];
	$country = $_POST['country'];
	$language = $_POST['language'];
	$description = $_POST['description'];

	// UPDATE DATABASE
	$sql = "UPDATE series 
	SET
		title = ?,
		rating = ?,
		`description` = ?,
		has_won_awards = ?,
		seasons = ?,
		country = ?,
		`language` = ?
	WHERE id = ? ";

	$stmt = $pdo->prepare($sql);
	
	$stmt->bindValue(1, $title);
	$stmt->bindValue(2, (int)$rating, PDO::PARAM_INT);
	$stmt->bindValue(3, $description);
	$stmt->bindValue(4, (int)$awards, PDO::PARAM_INT);
	$stmt->bindValue(5, (int)$seasons, PDO::PARAM_INT);
	$stmt->bindValue(6, $country);
	$stmt->bindValue(7, $language);
	$stmt->bindValue(8, $id);

	$stmt->execute();

	// TERUG NAAR HOOFDPAGINA
	header('location: index.php');
	exit;
} 

// RIJ SELECTEREN EN DETAILS FETCHEN
$id = $_GET['ID'];
$sql = $pdo->prepare("SELECT * FROM series WHERE id=?");
$sql->execute([$id]);
$details = $sql->fetch();

// HUIDIGE DETAILS VOOR GEBRUIK DEFAULT VALUES IN HTML FORM
$awards_current = $details['has_won_awards'];
$country_current = $details['country'];
$language_current = $details['language'];

?>

<!DOCTYPE html>

<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Series wijzigen</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>

     </style>
</head>

<body>
	
    <br>
    <a href="index.php">Terug</a>
    <h1><?= $details['title']; ?> - <?= $details['rating']; ?></h1>

    <form action="" method="POST">

		<input type="hidden" name="id" value="<?= $id ?>">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= $details['title'] ?>"><br><br>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" value="<?= $details['rating'] ?>"><br><br>

        <label for="awards">Awards:</label>
		<select name="awards" id="awards">
			<option value="ja"<?= $awards_current === 1 ? 'selected' : '' ?>>Ja</option>
			<option value="nee" <?= $awards_current === 0 ? 'selected' : '' ?>>Nee</option>
        </select><br><br>
        
        <label for="seasons">Seasons:</label>
		<input type="number" name="seasons" id="seasons" value="<?= $details['seasons'] ?>" required>
		<br><br>

        <label for="country">Country:</label>
        <select name="country" id="country">
			<option value="NL"<?= $country_current == "NL" ? 'selected' : '' ?>>NL</option>
			<option value="UK"<?= $country_current == "UK" ? 'selected' : '' ?>>UK</option>
        </select><br><br>

        <label for="language">Language:</label>
		<select name="language" id="language">
			<option value="NL"<?= $language_current == "NL" ? 'selected' : '' ?>>NL</option>
			<option value="EN"<?= $language_current == "EN" ? 'selected' : '' ?>>EN</option>
        </select><br><br>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="5" cols="40"><?= $details['description'] ?></textarea><br><br>

        <input type="submit" value="Update" name="update">

    </form>
             
</body>

</html>
