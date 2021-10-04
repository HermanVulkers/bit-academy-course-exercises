<?php
echo "<!DOCTYPE html>";
echo "<head>";
echo "<title>Bit Academy</title>";
echo "</head>";
echo "<body>";
echo "<h1>Meld je aan voor de nieuwsbrief van Bit Academy</h1>";
echo "<form action=\"/form.php\" method=\"post\">";
echo "<label for=\"email\"Voer je e-mailadres in:</label>";
echo "<input type=\"email\" id=\"email\" name=\"email\">";
echo "<input type=\"submit\" value=\"Meld aan!\">";
echo "</form>";
echo "</body>";
echo "</html>";

$email = $_POST["email"];

if (empty($_POST) == true) {
    echo ("");
    exit;
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: success.php');
} else {
    echo ("LET OP: $email is not a valid email address");
}
