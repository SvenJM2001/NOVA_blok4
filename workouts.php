<?php
include "connection.php"
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me_workouts</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        <div><H1>Work<span>4</span>Me</H1></div>
        <nav>
            <label id="minutes">00</label>:<label id="seconds">00</label>
            <ul>
                <li><a class="nav" href="index.php">Home</a></li>
                <li><a class="nav" href="#">Workouts</a></li>
                <li><a class="nav" href="data.php">Data</a></li>
            </ul>
            <div class="dropdown">
                <button class="dropdown_button">Mijn account</button>
                <ul class="dropdown_content">
                    <li><a href="#">Mijn gegevens</a></li>
                    <li><a href="login.php">Inloggen</a></li>
                    <li><a href="#">Uitloggen</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <script src="scripts.js"></script>
</html>