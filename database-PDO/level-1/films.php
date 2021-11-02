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

     $filmsRows = $pdo->query("SELECT * FROM films WHERE ID=$id");
     $filmsRow = $filmsRows->fetch();
} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
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
     <div class="container">

          <h1><?php echo $filmsRow['titel']; ?>: <?php echo $filmsRow['duur']; ?>inuten</h1>

          <h3>Datum van uitkomst: <?php echo $filmsRow['datumuitkomst']; ?></h3>
          <h3>Land van uitkomst: <?php echo $filmsRow['landuitkomst']; ?></h3>
          <p>Omschrijving: <?php echo $filmsRow['omschrijving']; ?></p>

          <iframe width="420" height="315" src="https://www.youtube.com/watch?v=<?php echo $filmsRow['idtrailer']; ?>"></iframe>

     </div>
</body>

</html>