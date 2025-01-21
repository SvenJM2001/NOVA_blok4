<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me registreer forum</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header>
        <div><H1>Work<span>4</span>Me</H1></div>
        <div><h2>Register</h2></div>
        <nav>
            <label id="minutes">00</label>:<label id="seconds">00</label>
            <ul>
                <li><a class="nav" href="index.php">Home</a></li>
                <li><a class="nav" href="workouts.php">Workouts</a></li>
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

    <main>
        <form action="register_process.php" method="POST">
            <!-- User Information -->
            <div class="user_info">
                <div class="user_title"><h2>User informatie</h2></div>
                <div class="user_form">
                    <input type="text" id="voornaam" name="voornaam" placeholder="Voornaam" required>

                    <input type="text" id="achternaam" name="achternaam" placeholder="Achternaam" required>

                    <input type="email" id="email" name="email" placeholder="E-mail" required>

                    <input type="text" id="gebruikersnaam" placeholder="Username" name="gebruikersnaam" required>

                    <input type="password" id="wachtwoord" placeholder="Wachtwoord" name="wachtwoord" required>

                    <div>
                        <label for="geslacht">Geslacht:</label>
                        <select id="geslacht" name="geslacht" required>
                            <option value="man">Man</option>
                            <option value="vrouw">Vrouw</option>
                        </select>
                    </div>
                    <div>
                        <label for="rol">Rol:</label>
                        <select id="rol" name="rol" onchange="toggleEmployeeInfo()" required>
                            <option value="klant">klant</option>
                            <option value="werknemer">werknemer</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="adress_info">
                <div class="adress_title"><h2>Address informatie</h2></div>
                <div class="adress_form">
                    <input type="text" id="straat" name="straat" placeholder="Straat" required><br>

                    <input type="text" id="huisnummer" name="huisnummer" placeholder="Huisnummer" required><br>

                    <input type="text" id="postcode" name="postcode" placeholder="Postcode" required><br>

                    <input type="text" id="plaats" name="plaats" placeholder="Stad of Plaats" required><br>

                    <input type="text" id="land" name="land" placeholder="Land" required><br>

                    <input type="text" id="telefoonnummer" name="telefoonnummer" placeholder="Telefoonnummer"><br>

                    <input type="text" id="mobielnummer" name="mobielnummer" placeholder="Mobielnummer"><br>
                </div>
            </div>
            

            <!-- Employee Information -->
            <div id="Werknemer-info" style="display: none;">
                <h2>Werknemer informatie</h2>
                <label for="werk_titel">Werk titel:</label>
                <input type="text" id="werk_titel" name="werk_titel"><br>
            </div>

            
            <button class="register_submit" type="submit">Registreer</button>
        </form>
        <button class="next">Volgende stap</button>
        <button class="back">Terug</button>
    </main>
    <script src="scripts.js"></script>
</body>
</html>
