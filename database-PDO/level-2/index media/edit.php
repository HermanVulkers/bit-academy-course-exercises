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
} catch (PDOException $e) {
	throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// ALS FORM GESUBMIT IS -> IF BLOCK RUNNEN
if (isset($_POST['update'])) {
	// POST VALUES TOEWIJZEN
	$id = $_POST['id'];
	$mediatype = $_POST['mediatype'];
	$title = $_POST['title'];
	$rating = $_POST['rating'];
	$description = $_POST['description'];
	$awards = $_POST['awards'];
	$duration = $_POST['duration'];
	$releasedate = $_POST['releasedate'];
	$seasons = $_POST['seasons'];
	$country = $_POST['country'];
	$language = $_POST['language'];
	$trailerid = $_POST['trailerid'];

	// DATABASE UPDATEN
	$sql = "UPDATE media 
	SET
		mediatype = ?,
		title = ?,
		rating = ?,
		`description` = ?,
		awards = ?,
		duration = ?,
		releasedate = ?,
		seasons = ?,
		country = ?,
		lang = ?,
		trailerid = ?
	WHERE id = ? ";

	$stmt = $pdo->prepare($sql);
	
	$stmt->bindValue(1, $mediatype);
	$stmt->bindValue(2, $title);
	$stmt->bindValue(3, (int)$rating, PDO::PARAM_INT);
	$stmt->bindValue(4, $description);
	$stmt->bindValue(5, (int)$awards, PDO::PARAM_INT);
	$stmt->bindValue(6, !empty($duration) ? (int)$duration : null, PDO::PARAM_INT);
	$stmt->bindValue(7, $releasedate);
	$stmt->bindValue(8, !empty($seasons) ? (int)$seasons : null, PDO::PARAM_INT);
	$stmt->bindValue(9, $country);
	$stmt->bindValue(10, $language);
	$stmt->bindValue(11, $trailerid);
	$stmt->bindValue(12, $id);

	$stmt->execute();

	// TERUG NAAR HOOFDPAGINA
	header('location: index.php');
	exit;
} 

// RIJ SELECTEREN EN DETAILS FETCHEN
$id = $_GET['id'];
$sql = $pdo->prepare("SELECT * FROM media WHERE id=?");
$sql->execute([$id]);
$details = $sql->fetch();

// HUIDIGE DETAILS VOOR GEBRUIK DEFAULT VALUES IN HTML FORM
$mediatype_current = $details['mediatype'];
$rating_current = $details['rating'];
$language_current = $details['lang'];
$country_current = $details['country'];

?>

<!DOCTYPE html>

<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edit media</title>
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>

     </style>
</head>

<body>
	
    <br>
    <a href="index.php">Terug</a>
    <h1>Edit media</h1>
	<h1><?= $details['title']; ?></h1>

    <form action="" method="POST">

		<input type="hidden" name="id" value="<?= $id ?>">

		<label for="mediatype">Mediatype (serie / film):</label><br>
		<select name="mediatype" id="mediatype" required>
			<option value="serie"<?= $mediatype_current == "serie" ? 'selected' : '' ?>>Serie</option>
			<option value="film"<?= $mediatype_current == "film" ? 'selected' : '' ?>>Film</option>
        </select><br><br>

        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?= $details['title'] ?>" required><br><br>

        <label for="rating">Rating:</label><br>
        <select name="rating" id="rating" required>
			<option value="1"<?= $rating_current == "1" ? 'selected' : '' ?>>1</option>
			<option value="2"<?= $rating_current == "2" ? 'selected' : '' ?>>2</option>
			<option value="3"<?= $rating_current == "3" ? 'selected' : '' ?>>3</option>
			<option value="4"<?= $rating_current == "4" ? 'selected' : '' ?>>4</option>
			<option value="5"<?= $rating_current == "5" ? 'selected' : '' ?>>5</option>
			<option value="6"<?= $rating_current == "6" ? 'selected' : '' ?>>6</option>
			<option value="7"<?= $rating_current == "7" ? 'selected' : '' ?>>7</option>
			<option value="8"<?= $rating_current == "8" ? 'selected' : '' ?>>8</option>
			<option value="9"<?= $rating_current == "9" ? 'selected' : '' ?>>9</option>
			<option value="10"<?= $rating_current == "10" ? 'selected' : '' ?>>10</option>
        </select><br><br>

		<label for="description">Description:</label><br>
        <input type="text" name="description" id="description" value="<?= $details['description'] ?>" size="200" required><br><br>

        <label for="awards">Awards:</label><br>
		<input type="number" id="awards" name="awards" value="<?= $details['awards'] ?>" required><br><br>
        
		<label for="duration">Duration: (leave empty of not applicable)</label><br>
        <input type="number" id="duration" name="duration" value="<?= $details['duration'] ?>"><br><br>

		<label for="datum">Date of release:</label><br>
		<input type="date" name="releasedate" id="date" value="<?= $details['releasedate'] ?>" required>
		<br><br>

		<label for="seasons">Seasons: (leave empty of not applicable)</label><br>
		<input type="number" name="seasons" id="seasons" value="<?= $details['seasons'] ?>">
		<br><br>

        <label for="country">Country of release:</label><br>
		<select name="country" id="country" required>
			
			<option value="Afganistan"<?= $country_current == "Afghanistan" ? 'selected' : '' ?>>Afghanistan</option>
			<option value="Albania"<?= $country_current == "Albania" ? 'selected' : '' ?>>Albania</option>
			<option value="Algeria"<?= $country_current == "Algeria" ? 'selected' : '' ?>>Algeria</option>
			<option value="American Samoa"<?= $country_current == "American Samoa" ? 'selected' : '' ?>>American Samoa</option>
			<option value="Andorra"<?= $country_current == "Andorra" ? 'selected' : '' ?>>Andorra</option>
			<option value="Angola"<?= $country_current == "Angola" ? 'selected' : '' ?>>Angola</option>
			<option value="Anguilla"<?= $country_current == "Anguilla" ? 'selected' : '' ?>>Anguilla</option>
			<option value="Antigua & Barbuda"<?= $country_current == "Antigua & Barbuda" ? 'selected' : '' ?>>Antigua & Barbuda</option>
			<option value="Argentina"<?= $country_current == "Argentina" ? 'selected' : '' ?>>Argentina</option>
			<option value="Armenia"<?= $country_current == "Armenia" ? 'selected' : '' ?>>Armenia</option>
			<option value="Aruba"<?= $country_current == "Aruba" ? 'selected' : '' ?>>Aruba</option>
			<option value="Australia"<?= $country_current == "Australia" ? 'selected' : '' ?>>Australia</option>
			<option value="Austria"<?= $country_current == "Austria" ? 'selected' : '' ?>>Austria</option>
			<option value="Azerbaijan"<?= $country_current == "Azerbaijan" ? 'selected' : '' ?>>Azerbaijan</option>
			<option value="Bahamas"<?= $country_current == "Bahamas" ? 'selected' : '' ?>>Bahamas</option>
			<option value="Bahrain"<?= $country_current == "Bahrain" ? 'selected' : '' ?>>Bahrain</option>
			<option value="Bangladesh"<?= $country_current == "Bangladesh" ? 'selected' : '' ?>>Bangladesh</option>
			<option value="Barbados"<?= $country_current == "Barbados" ? 'selected' : '' ?>>Barbados</option>
			<option value="Belarus"<?= $country_current == "Belarus" ? 'selected' : '' ?>>Belarus</option>
			<option value="Belgium"<?= $country_current == "Belgium" ? 'selected' : '' ?>>Belgium</option>
			<option value="Belize"<?= $country_current == "Belize" ? 'selected' : '' ?>>Belize</option>
			<option value="Benin"<?= $country_current == "Benin" ? 'selected' : '' ?>>Benin</option>
			<option value="Bermuda"<?= $country_current == "Bermuda" ? 'selected' : '' ?>>Bermuda</option>
			<option value="Bhutan"<?= $country_current == "Bhutan" ? 'selected' : '' ?>>Bhutan</option>
			<option value="Bolivia"<?= $country_current == "Bolivia" ? 'selected' : '' ?>>Bolivia</option>
			<option value="Bonaire"<?= $country_current == "Bonaire" ? 'selected' : '' ?>>Bonaire</option>
			<option value="Bosnia & Herzegovina"<?= $country_current == "Bosnia & Herzegovina" ? 'selected' : '' ?>>Bosnia & Herzegovina</option>
			<option value="Botswana"<?= $country_current == "Botswana" ? 'selected' : '' ?>>Botswana</option>
			<option value="Brazil"<?= $country_current == "Brazil" ? 'selected' : '' ?>>Brazil</option>
			<option value="British Indian Ocean Ter"<?= $country_current == "ritish Indian Ocean Ter" ? 'selected' : '' ?>>British Indian Ocean Ter</option>
			<option value="Brunei"<?= $country_current == "Brunei" ? 'selected' : '' ?>>Brunei</option>
			<option value="Bulgaria"<?= $country_current == "Bulgaria" ? 'selected' : '' ?>>Bulgaria</option>
			<option value="Burkina Faso"<?= $country_current == "Burkina Faso" ? 'selected' : '' ?>>Burkina Faso</option>
			<option value="Burundi"<?= $country_current == "Burundi" ? 'selected' : '' ?>>Burundi</option>
			<option value="Cambodia"<?= $country_current == "Cambodia" ? 'selected' : '' ?>>Cambodia</option>
			<option value="Cameroon"<?= $country_current == "Cameroon" ? 'selected' : '' ?>>Cameroon</option>
			<option value="Canada"<?= $country_current == "Canada" ? 'selected' : '' ?>>Canada</option>
			<option value="Canary Islands"<?= $country_current == "Canary Islands" ? 'selected' : '' ?>>Canary Islands</option>
			<option value="Cape Verde"<?= $country_current == "Cape Verde" ? 'selected' : '' ?>>Cape Verde</option>
			<option value="Cayman Islands"<?= $country_current == "Cayman Islands" ? 'selected' : '' ?>>Cayman Islands</option>
			<option value="Central African Republic"<?= $country_current == "Central African Republic" ? 'selected' : '' ?>>Central African Republic</option>
			<option value="Chad"<?= $country_current == "Chad" ? 'selected' : '' ?>>Chad</option>
			<option value="Channel Islands"<?= $country_current == "Channel Islands" ? 'selected' : '' ?>>Channel Islands</option>
			<option value="Chile"<?= $country_current == "Chile" ? 'selected' : '' ?>>Chile</option>
			<option value="China"<?= $country_current == "China" ? 'selected' : '' ?>>China</option>
			<option value="Christmas Island"<?= $country_current == "Christmas Island" ? 'selected' : '' ?>>Christmas Island</option>
			<option value="Cocos Island"<?= $country_current == "Cocos Island" ? 'selected' : '' ?>>Cocos Island</option>
			<option value="Colombia"<?= $country_current == "Colombia" ? 'selected' : '' ?>>Colombia</option>
			<option value="Comoros"<?= $country_current == "Comoros" ? 'selected' : '' ?>>Comoros</option>
			<option value="Congo"<?= $country_current == "Congo" ? 'selected' : '' ?>>Congo</option>
			<option value="Cook Islands"<?= $country_current == "Cook Islands" ? 'selected' : '' ?>>Cook Islands</option>
			<option value="Costa Rica"<?= $country_current == "Costa Rica" ? 'selected' : '' ?>>Costa Rica</option>
			<option value="Cote DIvoire"<?= $country_current == "Cote DIvoire" ? 'selected' : '' ?>>Cote DIvoire</option>
			<option value="Croatia"<?= $country_current == "Croatia" ? 'selected' : '' ?>>Croatia</option>
			<option value="Cuba"<?= $country_current == "Cuba" ? 'selected' : '' ?>>Cuba</option>
			<option value="Curaco"<?= $country_current == "Curaco" ? 'selected' : '' ?>>Curacao</option>
			<option value="Cyprus"<?= $country_current == "Cyprus" ? 'selected' : '' ?>>Cyprus</option>
			<option value="Czech Republic"<?= $country_current == "Czech Republic" ? 'selected' : '' ?>>Czech Republic</option>
			<option value="Denmark"<?= $country_current == "Denmark" ? 'selected' : '' ?>>Denmark</option>
			<option value="Djibouti"<?= $country_current == "Djibouti" ? 'selected' : '' ?>>Djibouti</option>
			<option value="Dominica"<?= $country_current == "Dominica" ? 'selected' : '' ?>>Dominica</option>
			<option value="Dominican Republic"<?= $country_current == "Dominican Republic" ? 'selected' : '' ?>>Dominican Republic</option>
			<option value="East Timor"<?= $country_current == "East Timor" ? 'selected' : '' ?>>East Timor</option>
			<option value="Ecuador"<?= $country_current == "Ecuador" ? 'selected' : '' ?>>Ecuador</option>
			<option value="Egypt"<?= $country_current == "Egypt" ? 'selected' : '' ?>>Egypt</option>
			<option value="El Salvador"<?= $country_current == "El Salvador" ? 'selected' : '' ?>>El Salvador</option>
			<option value="Equatorial Guinea"<?= $country_current == "Equatorial Guinea" ? 'selected' : '' ?>>Equatorial Guinea</option>
			<option value="Eritrea"<?= $country_current == "Eritrea" ? 'selected' : '' ?>>Eritrea</option>
			<option value="Estonia"<?= $country_current == "Estonia" ? 'selected' : '' ?>>Estonia</option>
			<option value="Ethiopia"<?= $country_current == "Ethiopia" ? 'selected' : '' ?>>Ethiopia</option>
			<option value="Falkland Islands"<?= $country_current == "Falkland Islands" ? 'selected' : '' ?>>Falkland Islands</option>
			<option value="Faroe Islands"<?= $country_current == "Faroe Islands" ? 'selected' : '' ?>>Faroe Islands</option>
			<option value="Fiji"<?= $country_current == "Fiji" ? 'selected' : '' ?>>Fiji</option>
			<option value="Finland"<?= $country_current == "Finland" ? 'selected' : '' ?>>Finland</option>
			<option value="France"<?= $country_current == "France" ? 'selected' : '' ?>>France</option>
			<option value="French Guiana"<?= $country_current == "French Guiana" ? 'selected' : '' ?>>French Guiana</option>
			<option value="French Polynesia"<?= $country_current == "French Polynesia" ? 'selected' : '' ?>>French Polynesia</option>
			<option value="French Southern Ter"<?= $country_current == "French Southern Ter" ? 'selected' : '' ?>>French Southern Ter</option>
			<option value="Gabon"<?= $country_current == "Gabon" ? 'selected' : '' ?>>Gabon</option>
			<option value="Gambia"<?= $country_current == "Gambia" ? 'selected' : '' ?>>Gambia</option>
			<option value="Georgia"<?= $country_current == "Georgia" ? 'selected' : '' ?>>Georgia</option>
			<option value="Germany"<?= $country_current == "Germany" ? 'selected' : '' ?>>Germany</option>
			<option value="Ghana"<?= $country_current == "Ghana" ? 'selected' : '' ?>>Ghana</option>
			<option value="Gibraltar"<?= $country_current == "Gibraltar" ? 'selected' : '' ?>>Gibraltar</option>
			<option value="Great Britain"<?= $country_current == "Great Britain" ? 'selected' : '' ?>>Great Britain</option>
			<option value="Greece"<?= $country_current == "Greece" ? 'selected' : '' ?>>Greece</option>
			<option value="Greenland"<?= $country_current == "Greenland" ? 'selected' : '' ?>>Greenland</option>
			<option value="Grenada"<?= $country_current == "Grenada" ? 'selected' : '' ?>>Grenada</option>
			<option value="Guadeloupe"<?= $country_current == "Guadeloupe" ? 'selected' : '' ?>>Guadeloupe</option>
			<option value="Guam"<?= $country_current == "Guam" ? 'selected' : '' ?>>Guam</option>
			<option value="Guatemala"<?= $country_current == "Guatemala" ? 'selected' : '' ?>>Guatemala</option>
			<option value="Guinea"<?= $country_current == "Guinea" ? 'selected' : '' ?>>Guinea</option>
			<option value="Guyana"<?= $country_current == "Guyana" ? 'selected' : '' ?>>Guyana</option>
			<option value="Haiti"<?= $country_current == "Haiti" ? 'selected' : '' ?>>Haiti</option>
			<option value="Hawaii"<?= $country_current == "Hawaii" ? 'selected' : '' ?>>Hawaii</option>
			<option value="Honduras"<?= $country_current == "Honduras" ? 'selected' : '' ?>>Honduras</option>
			<option value="Hong Kong"<?= $country_current == "Hong Kong" ? 'selected' : '' ?>>Hong Kong</option>
			<option value="Hungary"<?= $country_current == "Hungary" ? 'selected' : '' ?>>Hungary</option>
			<option value="Iceland"<?= $country_current == "Iceland" ? 'selected' : '' ?>>Iceland</option>
			<option value="Indonesia"<?= $country_current == "Indonesia" ? 'selected' : '' ?>>Indonesia</option>
			<option value="India"<?= $country_current == "India" ? 'selected' : '' ?>>India</option>
			<option value="Iran"<?= $country_current == "Iran" ? 'selected' : '' ?>>Iran</option>
			<option value="Iraq"<?= $country_current == "Iraq" ? 'selected' : '' ?>>Iraq</option>
			<option value="Ireland"<?= $country_current == "Ireland" ? 'selected' : '' ?>>Ireland</option>
			<option value="Isle of Man"<?= $country_current == "Isle of Man" ? 'selected' : '' ?>>Isle of Man</option>
			<option value="Israel"<?= $country_current == "Israel" ? 'selected' : '' ?>>Israel</option>
			<option value="Italy"<?= $country_current == "Italy" ? 'selected' : '' ?>>Italy</option>
			<option value="Jamaica"<?= $country_current == "Jamaica" ? 'selected' : '' ?>>Jamaica</option>
			<option value="Japan"<?= $country_current == "Japan" ? 'selected' : '' ?>>Japan</option>
			<option value="Jordan"<?= $country_current == "Jordan" ? 'selected' : '' ?>>Jordan</option>
			<option value="Kazakhstan"<?= $country_current == "Kazakhstan" ? 'selected' : '' ?>>Kazakhstan</option>
			<option value="Kenya"<?= $country_current == "Kenya" ? 'selected' : '' ?>>Kenya</option>
			<option value="Kiribati"<?= $country_current == "Kiribati" ? 'selected' : '' ?>>Kiribati</option>
			<option value="Korea North"<?= $country_current == "Korea North" ? 'selected' : '' ?>>Korea North</option>
			<option value="Korea South"<?= $country_current == "Korea South" ? 'selected' : '' ?>>Korea South</option>
			<option value="Kuwait"<?= $country_current == "Kuwait" ? 'selected' : '' ?>>Kuwait</option>
			<option value="Kyrgyzstan"<?= $country_current == "Kyrgyzstan" ? 'selected' : '' ?>>Kyrgyzstan</option>
			<option value="Laos"<?= $country_current == "Laos" ? 'selected' : '' ?>>Laos</option>
			<option value="Latvia"<?= $country_current == "Latvia" ? 'selected' : '' ?>>Latvia</option>
			<option value="Lebanon"<?= $country_current == "Lebanon" ? 'selected' : '' ?>>Lebanon</option>
			<option value="Lesotho"<?= $country_current == "Lesotho" ? 'selected' : '' ?>>Lesotho</option>
			<option value="Liberia"<?= $country_current == "Liberia" ? 'selected' : '' ?>>Liberia</option>
			<option value="Libya"<?= $country_current == "Libya" ? 'selected' : '' ?>>Libya</option>
			<option value="Liechtenstein"<?= $country_current == "Liechtenstein" ? 'selected' : '' ?>>Liechtenstein</option>
			<option value="Lithuania"<?= $country_current == "Lithuania" ? 'selected' : '' ?>>Lithuania</option>
			<option value="Luxembourg"<?= $country_current == "Luxembourg" ? 'selected' : '' ?>>Luxembourg</option>
			<option value="Macau"<?= $country_current == "Macau" ? 'selected' : '' ?>>Macau</option>
			<option value="Macedonia"<?= $country_current == "Macedonia" ? 'selected' : '' ?>>Macedonia</option>
			<option value="Madagascar"<?= $country_current == "Madagascar" ? 'selected' : '' ?>>Madagascar</option>
			<option value="Malaysia"<?= $country_current == "Malaysia" ? 'selected' : '' ?>>Malaysia</option>
			<option value="Malawi"<?= $country_current == "Malawi" ? 'selected' : '' ?>>Malawi</option>
			<option value="Maldives"<?= $country_current == "Maldives" ? 'selected' : '' ?>>Maldives</option>
			<option value="Mali"<?= $country_current == "Mali" ? 'selected' : '' ?>>Mali</option>
			<option value="Malta"<?= $country_current == "Malta" ? 'selected' : '' ?>>Malta</option>
			<option value="Marshall Islands"<?= $country_current == "Marshall Islands" ? 'selected' : '' ?>>Marshall Islands</option>
			<option value="Martinique"<?= $country_current == "Martinique" ? 'selected' : '' ?>>Martinique</option>
			<option value="Mauritania"<?= $country_current == "Mauritania" ? 'selected' : '' ?>>Mauritania</option>
			<option value="Mauritius"<?= $country_current == "Mauritius" ? 'selected' : '' ?>>Mauritius</option>
			<option value="Mayotte"<?= $country_current == "Mayotte" ? 'selected' : '' ?>>Mayotte</option>
			<option value="Mexico"<?= $country_current == "Mexico" ? 'selected' : '' ?>>Mexico</option>
			<option value="Midway Islands"<?= $country_current == "Midway Islands" ? 'selected' : '' ?>>Midway Islands</option>
			<option value="Moldova"<?= $country_current == "Moldova" ? 'selected' : '' ?>>Moldova</option>
			<option value="Monaco"<?= $country_current == "Monaco" ? 'selected' : '' ?>>Monaco</option>
			<option value="Mongolia"<?= $country_current == "Mongolia" ? 'selected' : '' ?>>Mongolia</option>
			<option value="Montserrat"<?= $country_current == "Montserrat" ? 'selected' : '' ?>>Montserrat</option>
			<option value="Morocco"<?= $country_current == "Morocco" ? 'selected' : '' ?>>Morocco</option>
			<option value="Mozambique"<?= $country_current == "Mozambique" ? 'selected' : '' ?>>Mozambique</option>
			<option value="Myanmar"<?= $country_current == "Myanmar" ? 'selected' : '' ?>>Myanmar</option>
			<option value="Nambia"<?= $country_current == "Nambia" ? 'selected' : '' ?>>Nambia</option>
			<option value="Nauru"<?= $country_current == "Nauru" ? 'selected' : '' ?>>Nauru</option>
			<option value="Nepal"<?= $country_current == "Nepal" ? 'selected' : '' ?>>Nepal</option>
			<option value="Netherland Antilles"<?= $country_current == "Netherland Antilles" ? 'selected' : '' ?>>Netherland Antilles</option>
			<option value="Netherlands"<?= $country_current == "Netherlands" ? 'selected' : '' ?>>Netherlands (Holland, Europe)</option>
			<option value="Nevis"<?= $country_current == "Nevis" ? 'selected' : '' ?>>Nevis</option>
			<option value="New Caledonia"<?= $country_current == "New Caledonia" ? 'selected' : '' ?>>New Caledonia</option>
			<option value="New Zealand"<?= $country_current == "New Zealand" ? 'selected' : '' ?>>New Zealand</option>
			<option value="Nicaragua"<?= $country_current == "Nicaragua" ? 'selected' : '' ?>>Nicaragua</option>
			<option value="Niger"<?= $country_current == "Niger" ? 'selected' : '' ?>>Niger</option>
			<option value="Nigeria"<?= $country_current == "Nigeria" ? 'selected' : '' ?>>Nigeria</option>
			<option value="Niue"<?= $country_current == "Niue" ? 'selected' : '' ?>>Niue</option>
			<option value="Norfolk Island"<?= $country_current == "Norfolk Island" ? 'selected' : '' ?>>Norfolk Island</option>
			<option value="Norway"<?= $country_current == "Norway" ? 'selected' : '' ?>>Norway</option>
			<option value="Oman"<?= $country_current == "Oman" ? 'selected' : '' ?>>Oman</option>
			<option value="Pakistan"<?= $country_current == "Pakistan" ? 'selected' : '' ?>>Pakistan</option>
			<option value="Palau Island"<?= $country_current == "Palau Island" ? 'selected' : '' ?>>Palau Island</option>
			<option value="Palestine"<?= $country_current == "Palestine" ? 'selected' : '' ?>>Palestine</option>
			<option value="Panama"<?= $country_current == "Panama" ? 'selected' : '' ?>>Panama</option>
			<option value="Papua New Guinea"<?= $country_current == "Papua New Guinea" ? 'selected' : '' ?>>Papua New Guinea</option>
			<option value="Paraguay"<?= $country_current == "Paraguay" ? 'selected' : '' ?>>Paraguay</option>
			<option value="Peru"<?= $country_current == "Peru" ? 'selected' : '' ?>>Peru</option>
			<option value="Phillipines"<?= $country_current == "Phillipines" ? 'selected' : '' ?>>Philippines</option>
			<option value="Pitcairn Island"<?= $country_current == "Pitcairn Island" ? 'selected' : '' ?>>Pitcairn Island</option>
			<option value="Poland"<?= $country_current == "Poland" ? 'selected' : '' ?>>Poland</option>
			<option value="Portugal"<?= $country_current == "Portugal" ? 'selected' : '' ?>>Portugal</option>
			<option value="Puerto Rico"<?= $country_current == "Puerto Rico" ? 'selected' : '' ?>>Puerto Rico</option>
			<option value="Qatar"<?= $country_current == "Qatar" ? 'selected' : '' ?>>Qatar</option>
			<option value="Republic of Montenegro"<?= $country_current == "Republic of Montenegro" ? 'selected' : '' ?>>Republic of Montenegro</option>
			<option value="Republic of Serbia"<?= $country_current == "Republic of Serbia" ? 'selected' : '' ?>>Republic of Serbia</option>
			<option value="Reunion"<?= $country_current == "Reunion" ? 'selected' : '' ?>>Reunion</option>
			<option value="Romania"<?= $country_current == "Romania" ? 'selected' : '' ?>>Romania</option>
			<option value="Russia"<?= $country_current == "Russia" ? 'selected' : '' ?>>Russia</option>
			<option value="Rwanda"<?= $country_current == "Rwanda" ? 'selected' : '' ?>>Rwanda</option>
			<option value="St Barthelemy"<?= $country_current == "St Barthelemy" ? 'selected' : '' ?>>St Barthelemy</option>
			<option value="St Eustatius"<?= $country_current == "St Eustatius" ? 'selected' : '' ?>>St Eustatius</option>
			<option value="St Helena"<?= $country_current == "St Helena" ? 'selected' : '' ?>>St Helena</option>
			<option value="St Kitts-Nevis"<?= $country_current == "St Kitts-Nevis" ? 'selected' : '' ?>>St Kitts-Nevis</option>
			<option value="St Lucia"<?= $country_current == "St Lucia" ? 'selected' : '' ?>>St Lucia</option>
			<option value="St Maarten"<?= $country_current == "St Maarten" ? 'selected' : '' ?>>St Maarten</option>
			<option value="St Pierre & Miquelon"<?= $country_current == "St Pierre & Miquelon" ? 'selected' : '' ?>>St Pierre & Miquelon</option>
			<option value="St Vincent & Grenadines"<?= $country_current == "St Vincent & Grenadines" ? 'selected' : '' ?>>St Vincent & Grenadines</option>
			<option value="Saipan"<?= $country_current == "Saipan" ? 'selected' : '' ?>>Saipan</option>
			<option value="Samoa"<?= $country_current == "Samoa" ? 'selected' : '' ?>>Samoa</option>
			<option value="Samoa American"<?= $country_current == "Samoa American" ? 'selected' : '' ?>>Samoa American</option>
			<option value="San Marino"<?= $country_current == "San Marino" ? 'selected' : '' ?>>San Marino</option>
			<option value="Sao Tome & Principe"<?= $country_current == "Sao Tome & Principe" ? 'selected' : '' ?>>Sao Tome & Principe</option>
			<option value="Saudi Arabia"<?= $country_current == "Saudi Arabia" ? 'selected' : '' ?>>Saudi Arabia</option>
			<option value="Senegal"<?= $country_current == "Senegal" ? 'selected' : '' ?>>Senegal</option>
			<option value="Seychelles"<?= $country_current == "Seychelles" ? 'selected' : '' ?>>Seychelles</option>
			<option value="Sierra Leone"<?= $country_current == "Sierra Leone" ? 'selected' : '' ?>>Sierra Leone</option>
			<option value="Singapore"<?= $country_current == "Singapore" ? 'selected' : '' ?>>Singapore</option>
			<option value="Slovakia"<?= $country_current == "Slovakia" ? 'selected' : '' ?>>Slovakia</option>
			<option value="Slovenia"<?= $country_current == "Slovenia" ? 'selected' : '' ?>>Slovenia</option>
			<option value="Solomon Islands"<?= $country_current == "Solomon Islands" ? 'selected' : '' ?>>Solomon Islands</option>
			<option value="Somalia"<?= $country_current == "Somalia" ? 'selected' : '' ?>>Somalia</option>
			<option value="South Africa"<?= $country_current == "South Africa" ? 'selected' : '' ?>>South Africa</option>
			<option value="Spain"<?= $country_current == "Spain" ? 'selected' : '' ?>>Spain</option>
			<option value="Sri Lanka"<?= $country_current == "Sri Lanka" ? 'selected' : '' ?>>Sri Lanka</option>
			<option value="Sudan"<?= $country_current == "Sudan" ? 'selected' : '' ?>>Sudan</option>
			<option value="Suriname"<?= $country_current == "Suriname" ? 'selected' : '' ?>>Suriname</option>
			<option value="Swaziland"<?= $country_current == "Swaziland" ? 'selected' : '' ?>>Swaziland</option>
			<option value="Sweden"<?= $country_current == "Sweden" ? 'selected' : '' ?>>Sweden</option>
			<option value="Switzerland"<?= $country_current == "Switzerland" ? 'selected' : '' ?>>Switzerland</option>
			<option value="Syria"<?= $country_current == "Syria" ? 'selected' : '' ?>>Syria</option>
			<option value="Tahiti"<?= $country_current == "Tahiti" ? 'selected' : '' ?>>Tahiti</option>
			<option value="Taiwan"<?= $country_current == "Taiwan" ? 'selected' : '' ?>>Taiwan</option>
			<option value="Tajikistan"<?= $country_current == "Tajikistan" ? 'selected' : '' ?>>Tajikistan</option>
			<option value="Tanzania"<?= $country_current == "Tanzania" ? 'selected' : '' ?>>Tanzania</option>
			<option value="Thailand"<?= $country_current == "Thailand" ? 'selected' : '' ?>>Thailand</option>
			<option value="Togo"<?= $country_current == "Togo" ? 'selected' : '' ?>>Togo</option>
			<option value="Tokelau"<?= $country_current == "Tokelau" ? 'selected' : '' ?>>Tokelau</option>
			<option value="Tonga"<?= $country_current == "Tonga" ? 'selected' : '' ?>>Tonga</option>
			<option value="Trinidad & Tobago"<?= $country_current == "Trinidad & Tobago" ? 'selected' : '' ?>>Trinidad & Tobago</option>
			<option value="Tunisia"<?= $country_current == "Tunisia" ? 'selected' : '' ?>>Tunisia</option>
			<option value="Turkey"<?= $country_current == "Turkey" ? 'selected' : '' ?>>Turkey</option>
			<option value="Turkmenistan"<?= $country_current == "Turkmenistan" ? 'selected' : '' ?>>Turkmenistan</option>
			<option value="Turks & Caicos Is"<?= $country_current == "Turks & Caicos Is" ? 'selected' : '' ?>>Turks & Caicos Is</option>
			<option value="Tuvalu"<?= $country_current == "Tuvalu" ? 'selected' : '' ?>>Tuvalu</option>
			<option value="Uganda"<?= $country_current == "Uganda" ? 'selected' : '' ?>>Uganda</option>
			<option value="United Kingdom"<?= $country_current == "United Kingdom" ? 'selected' : '' ?>>United Kingdom</option>
			<option value="Ukraine"<?= $country_current == "Ukraine" ? 'selected' : '' ?>>Ukraine</option>
			<option value="United Arab Erimates"<?= $country_current == "United Arab Erimates" ? 'selected' : '' ?>>United Arab Emirates</option>
			<option value="United States of America"<?= $country_current == "United States of America" ? 'selected' : '' ?>>United States of America</option>
			<option value="Uraguay"<?= $country_current == "Uraguay" ? 'selected' : '' ?>>Uruguay</option>
			<option value="Uzbekistan"<?= $country_current == "Uzbekistan" ? 'selected' : '' ?>>Uzbekistan</option>
			<option value="Vanuatu"<?= $country_current == "Vanuatu" ? 'selected' : '' ?>>Vanuatu</option>
			<option value="Vatican City State"<?= $country_current == "Vatican City State" ? 'selected' : '' ?>>Vatican City State</option>
			<option value="Venezuela"<?= $country_current == "Venezuela" ? 'selected' : '' ?>>Venezuela</option>
			<option value="Vietnam"<?= $country_current == "Vietnam" ? 'selected' : '' ?>>Vietnam</option>
			<option value="Virgin Islands (Brit)"<?= $country_current == "Virgin Islands (Brit)" ? 'selected' : '' ?>>Virgin Islands (Brit)</option>
			<option value="Virgin Islands (USA)"<?= $country_current == "Virgin Islands (USA)" ? 'selected' : '' ?>>Virgin Islands (USA)</option>
			<option value="Wake Island"<?= $country_current == "Wake Island" ? 'selected' : '' ?>>Wake Island</option>
			<option value="Wallis & Futana Is"<?= $country_current == "Wallis & Futana Is" ? 'selected' : '' ?>>Wallis & Futana Is</option>
			<option value="Yemen"<?= $country_current == "Yemen" ? 'selected' : '' ?>>Yemen</option>
			<option value="Zaire"<?= $country_current == "Zaire" ? 'selected' : '' ?>>Zaire</option>
			<option value="Zambia"<?= $country_current == "Zambia" ? 'selected' : '' ?>>Zambia</option>
			<option value="Zimbabwe"<?= $country_current == "Zimbabwe" ? 'selected' : '' ?>>Zimbabwe</option>
		</select><br><br>

        <label for="language">Language:</label><br>
		<select name="language" id="language" required>
			<option value="NL"<?= $language_current == "NL" ? 'selected' : '' ?>>NL</option>
			<option value="EN"<?= $language_current == "EN" ? 'selected' : '' ?>>EN</option>
        </select><br><br>

		<label for="title">Trailer ID:</label><br>
        <input type="text" id="trailerid" name="trailerid" value="<?= $details['trailerid'] ?>"><br><br>

        <input type="submit" value="Edit media" name="update">

    </form>
             
</body>

</html>
