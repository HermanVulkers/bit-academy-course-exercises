<?php

$firstNumber = $_POST['firstNumber'];
$secondNumber = $_POST['secondNumber'];
$operator = $_POST['operator'];

function calculate($firstNumber, $secondNumber, $operator) 
{
    switch ($operator) {
        case 'Add':
            return $firstNumber + $secondNumber;
            break;
        case 'Subtract':
            return $firstNumber - $secondNumber;
            break;
        case 'Multiply':
            return $firstNumber * $secondNumber;
            break;
        case 'Divide':
            if ($secondNumber == 0) {
                echo "Can't divide by 0";
            } else {
                return $firstNumber / $secondNumber;
            }
            break;
        case 'Modulo':
            if ($secondNumber == 0) {
                echo "Can't divide by 0";
            } else {
                return $firstNumber % $secondNumber;
            }
            break;
    }
}

$answer = calculate($firstNumber, $secondNumber, $operator);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <h1>Calculator</h1>

    <form action='calculator.php' method="POST">
        <label for="number">First number</label>
        <input type="number" name="firstNumber" id="number">
        <br><br>
        <label for="number">Second number</label>
        <input type="number" name="secondNumber" id="number">
        <br><br>

        <input type='submit' name = 'operator' value = 'Add' id='submit'>
        <input type='submit' name = 'operator' value = 'Subtract' id='submit' > 
        <input type='submit' name = 'operator' value = 'Multiply' id='submit' >
        <input type='submit' name = 'operator' value = 'Divide' id='submit' >
        <input type='submit' name = 'operator' value = 'Modulo' id='submit' >
    </form>

    <br>

    <div id="answer">
        <?php
            echo 'The result is: ' . $answer;
        ?>
    </div>

</body>
</html>

