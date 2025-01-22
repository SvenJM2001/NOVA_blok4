<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        <div><H1>Work<span>4</span>Me</H1></div>
        <nav>
            <label id="minutes">00</label>:<label id="seconds">00</label>
            <ul>
                <li><a class="nav" href="#">Home</a></li>
                <li><a class="nav" href="workouts.php">Workouts</a></li>
                <li><a class="nav" href="data.php">Data</a></li>
                <?php
                if(isset($_SESSION['gebruikersnaam'])){
                ?>
                <li><a href="profiel.php"><?php echo $_SESSION['gebruikersnaam'] ?></a></li>
                <?php
                } else {
                ?>
                <li><a href="login.php">Inloggen</a></li>
                <?php
                }
                ?>
            </ul>
            <div class="dropdown">
                <button class="dropdown_button">Mijn account</button>
                <ul class="dropdown_content">
                    <li><a href="#">Mijn gegevens</a></li>
                    <li><a href="login.php">Inloggen</a></li>
                    <li><button class="uitloggen">loguit</button></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="loguit_veld">
            <button class="loguit_weg">terug</button>
            <div class="loguit">
                <button class="loguit_button">log uit</button>
                <div class="zekerheids_check">
                    <p>weet u zeker dat u wilt uitloggen?</p>
                    <button class="niet_zeker">Nee</button>
                    <button class="wel_zeker">Ja</button>
                </div>
            </div>
        </section>
    
        <div class="banner">
            <div>
                <h2>Word nu lid</h2>
                <button class="register"><a href="register.php">Lid Worden</a></button>
            </div>
        </div>
        
    </main>
    <script src="scripts.js"></script>
</body>
</html>