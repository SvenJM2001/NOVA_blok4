<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me_Register</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="workouts.php">Workouts</a></li>
                <li><a href="data.php">Data</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Register</h1>
        <form action="register_process.php" method="POST">
            <!-- User Information -->
            <h2>User Information</h2>
            <label for="voornaam">First Name:</label>
            <input type="text" id="voornaam" name="voornaam" required><br>

            <label for="achternaam">Last Name:</label>
            <input type="text" id="achternaam" name="achternaam" required><br>

            <label for="geslacht">Gender:</label>
            <select id="geslacht" name="geslacht" required>
                <option value="man">Man</option>
                <option value="vrouw">Vrouw</option>
            </select><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="gebruikersnaam">Username:</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam" required><br>

            <label for="wachtwoord">Password:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required><br>

            <label for="rol">Role:</label>
            <select id="rol" name="rol" required>
                <option value="klant">klant</option>
                <option value="werknemer">werknemer</option>
            </select><br>

            <!-- Address Information -->
            <h2>Address Information</h2>
            <label for="straat">Street:</label>
            <input type="text" id="straat" name="straat" required><br>

            <label for="huisnummer">House Number:</label>
            <input type="text" id="huisnummer" name="huisnummer" required><br>

            <label for="postcode">Postal Code:</label>
            <input type="text" id="postcode" name="postcode" required><br>

            <label for="plaats">City:</label>
            <input type="text" id="plaats" name="plaats" required><br>

            <label for="land">Country:</label>
            <input type="text" id="land" name="land" required><br>

            <label for="telefoonnummer">Phone Number:</label>
            <input type="text" id="telefoonnummer" name="telefoonnummer"><br>

            <label for="mobielnummer">Mobile Number:</label>
            <input type="text" id="mobielnummer" name="mobielnummer"><br>

            <!-- Customer Information -->
            <h2>Customer Information</h2>
            <label for="klantnummer">Customer Number:</label>
            <input type="text" id="klantnummer" name="klantnummer"><br>

            <label for="laatste_login_datum">Last Login Date:</label>
            <input type="date" id="laatste_login_datum" name="laatste_login_datum"><br>

            <!-- Employee Information -->
            <h2>Employee Information</h2>
            <label for="start_datum">Start Date:</label>
            <input type="date" id="start_datum" name="start_datum"><br>

            <label for="werk_titel">Job Title:</label>
            <input type="text" id="werk_titel" name="werk_titel"><br>

            <button type="submit">Register</button>
        </form>
    </main>
</body>
</html>
