<?php

$username = $_POST['username'];
$email = $_POST['email'];
$age = $_POST['age'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forum handler</title>
</head>

<body>
	<h1>Forum registratie</h1>
	<h3>Jouw username is <?= $username ?>
		<h3>Jouw email is <?= $email ?>
			<h3>Jouw age is <?= $age ?>
</body>

</html>