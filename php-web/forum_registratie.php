<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum registratie</title>
</head>
<body>
    <h1>Forum registratie</h1>
    
    <form action='registratie_handler.php' method="post">

    <label for='username'>Username:</label>
    <input type="text" name='username' id='username'>
    <br><br>
    <label for='email'>Email:</label>
    <input type="email" name='email' id='email'>
    <br><br>
    <label for='age'>Age:</label>
    <input type="text" name='age' id='age'>
    <br><br>
    <input type="submit" value="Verstuur">

    </form>

    <?php


    ?>




</body>
</html>