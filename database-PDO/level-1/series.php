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

     $seriesRows = $pdo->query("SELECT * FROM series WHERE id=$id");
     $seriesRow = $seriesRows->fetch();
} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
}


if ($seriesRow['has_won_awards'] == 1) {
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
     <title>Series</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>

     </style>
</head>

<body>
     <br>
     <a href="index.php">Terug</a>
     <h1><?php echo $seriesRow['title']; ?> - <?php echo $seriesRow['rating']; ?></h1>
     <h3>Awards: <?php echo $award; ?></h3>
     <h3>Seasons: <?php echo $seriesRow['seasons']; ?></h3>
     <h3>Country: <?php echo $seriesRow['country']; ?></h3>
     <h3>Language: <?php echo $seriesRow['language']; ?></h3>
     <p>Description: <?php echo $seriesRow['description']; ?></p>
     </div>
</body>

</html>