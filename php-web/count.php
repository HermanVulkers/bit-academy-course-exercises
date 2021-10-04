<html>

<head>
    <title>Bezoek teller</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['count'])) {
        ?>
        Welkom! Dit is de eerste keer dat je de pagina bezoekt.
        <?php
        $cookie = 1;
        setcookie("count", $cookie, time() + 8000);
    } else {
        $cookie = ++$_COOKIE['count'];
        setcookie("count", $cookie, time() + 8000);
        ?>
        Bezocht: <?= $_COOKIE['count'] ?> keer.
    <?php  } // end else  
    ?>
</body>

</html>