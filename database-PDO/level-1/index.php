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

     $pdoQuery1 = "SELECT * FROM series";
     if ($_GET['sortSeries'] == 'title') {
          $pdoQuery1 .= " ORDER BY title ASC";
     }
     if ($_GET['sortSeries'] == 'rating') {
          $pdoQuery1 .= " ORDER BY rating DESC";
     }
     $pdoQuery_run1 = $pdo->query($pdoQuery1);

     $pdoQuery2 = "SELECT * FROM films";
     if ($_GET['sortFilms'] == 'title') {
          $pdoQuery2 .= " ORDER BY titel ASC";
     }
     if ($_GET['sortFilms'] == 'duration') {
          $pdoQuery2 .= " ORDER BY duur ASC";
     }
     $pdoQuery_run2 = $pdo->query($pdoQuery2);

     $id = $_GET['ID'];
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

          <h1>Welkom op het Netland beheerders paneel</h1>
          <h2>Series</h2>

          <table>
               <thead>
                    <tr>
                         <th><a href="index.php?sortSeries=title">Title</a></th>
                         <th><a href="index.php?sortSeries=rating">Rating</a></th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($pdoQuery_run1 as $row) { ?>
                         <tr>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['rating']; ?></td>
                              <td><a href="series.php?ID=<?php echo $row['id'] ?>">Meer details<a></td>
                         </tr>
                    <?php } ?>

               </tbody>
          </table>
          <h2>Films</h2>
          <table>
               <thead>
                    <tr>
                         <th><a href="index.php?sortFilms=title">Title</a></th>
                         <th><a href="index.php?sortFilms=duration">Duration</a></th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($pdoQuery_run2 as $row) { ?>
                         <tr>
                              <td><?php echo $row['titel']; ?></td>
                              <td><?php echo $row['duur']; ?></td>
                              <td><a href="films.php?ID=<?php echo $row['ID'] ?>">Meer details<a></td>
                         </tr>
                    <?php } ?>
               </tbody>
          </table>
     </div>
</body>

</html>