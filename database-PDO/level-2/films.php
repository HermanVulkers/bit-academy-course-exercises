
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

     $id = $_GET['ID'];

     $row_selected = $pdo->query("SELECT * FROM films WHERE ID=$id");
     $row_fetched = $row_selected->fetch();
} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
}


if ($row_fetched['has_won_awards'] == 1) {
    $award = "yes";
} else {
    $award = "no";
}

?>

<!DOCTYPE html>


<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Films</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>

     </style>
</head>

<body>
    <br>
    <a href="index.php">Terug</a>
     <h1><?php echo $row_fetched['titel']; ?> - <?php echo $row_fetched['duur'] . ' minutes'; ?></h1>
     <h3>Date release: <?php echo $row_fetched['datumuitkomst']; ?></h3>
     <h3>Country of release: <?php echo $row_fetched['landuitkomst']; ?></h3>
     <p>Description: <?php echo $row_fetched['omschrijving']; ?></p>
	 <p>Trailer ID: <?php echo $row_fetched['idtrailer']; ?></p>          
          
     </div>
</body>

</html>