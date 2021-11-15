<?php
session_start();


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
	echo "Connection succesful." . PHP_EOL;
} catch (PDOException $e) {
	throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// ALS FORM GESUBMIT IS -> IF BLOCK RUNNEN
if (isset($_POST['submit'])) {
	// POST VALUES TOEWIJZEN
	$username = $_POST['username'];
	$password = $_POST['password'];

	$stmt = $pdo->query("SELECT `password` FROM gebruikers WHERE username='$username'");

    $data = $stmt->fetch();
    $stored_password = $data['password'];

	if ($password === $stored_password) {
        echo "<h3>Login successful!</h3>" . PHP_EOL;
		$_SESSION['logged_in'] = true;
		header('location: index.php');
		exit;
    } else {
        echo "<h3 style='color:red;'>Authentication failed. Please try again.</h3>";
    }
}

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Netland Admin Panel</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<style>

	</style>
</head>

<body>
	<div class="container">

		<h1>Login Netland Admin Panel</h1>

		<form action="" method="POST">

		<label for="username">Username:</label>
		<input type="text" name="username" value="" id="username">

		<label for="username">Password:</label>
		<input type="password" name="password" value="" id="password">

		<input type="submit" value="Submit" name="submit">

		</form>

	</div>
</body>

</html>
