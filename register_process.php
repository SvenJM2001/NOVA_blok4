<?php
include "connection.php";

// Retrieve POST data
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$geslacht = $_POST['geslacht'];
$email = $_POST['email'];
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
$rol = $_POST['rol'];

$straat = $_POST['straat'];
$huisnummer = $_POST['huisnummer'];
$postcode = $_POST['postcode'];
$plaats = $_POST['plaats'];
$land = $_POST['land'];
$telefoonnummer = $_POST['telefoonnummer'];
$mobielnummer = $_POST['mobielnummer'];

// Prepare variables for optional inserts
$klantnummer = null;
$laatste_login_datum = null;
$begin_datum = null;
$baan_titel = null;

// Handle role-specific data
if ($rol === 'klant') {
    $klantnummer = substr(bin2hex(random_bytes(4)), 0, 8);
    $laatste_login_datum = date('Y-m-d H:i:s');
} elseif ($rol === 'werknemer') {
    $begin_datum = date('Y-m-d H:i:s');
    $baan_titel = $_POST['werk_titel'];
}

// Insert into `users` table
$sql_users = "INSERT INTO users (voornaam, achternaam, geslacht, email, gebruikersnaam, wachtwoord, rol)
VALUES ('$voornaam', '$achternaam', '$geslacht', '$email', '$gebruikersnaam', '$wachtwoord', '$rol')";
$conn->query($sql_users);

// Get the inserted user's ID
$user_id = $conn->insert_id;

// Insert into `adres` table
$sql_adres = "INSERT INTO adres (user_id, straat, huisnummer, postcode, plaats, land, telefoonnummer, mobielnummer)
VALUES ('$user_id', '$straat', '$huisnummer', '$postcode', '$plaats', '$land', '$telefoonnummer', '$mobielnummer')";
$conn->query($sql_adres);

// Insert into `klanten` table if the role is "klant"
if ($rol === 'klant') {
    $sql_klanten = "INSERT INTO klanten (user_id, klantnummer, laatste_login_datum)
    VALUES ('$user_id', '$klantnummer', '$laatste_login_datum')";
    $conn->query($sql_klanten);
}

// Insert into `werknemers` table if the role is "werknemer"
if ($rol === 'werknemer') {
    $sql_werknemers = "INSERT INTO werknemers (user_id, start_datum, werk_titel)
    VALUES ('$user_id', '$begin_datum', '$baan_titel')";
    $conn->query($sql_werknemers);
}

$conn->close();

// Redirect to the index page
header("Location: index.php");
exit();
?>
