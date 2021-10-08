<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}
?>

<html>

<head>
    <title>Bezoek teller</title>
</head>

<body>

Bezocht: <?= $_SESSION['count'] ?> keer.
     
</body>

</html>