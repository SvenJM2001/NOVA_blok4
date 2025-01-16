<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me registreer forum</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script>
        function toggleEmployeeInfo() {
            const roleSelect = document.getElementById("rol");
            const employeeInfo = document.getElementById("Werknemer-info");
            if (roleSelect.value === "werknemer") {
                employeeInfo.style.display = "block";
            } else {
                employeeInfo.style.display = "none";
            }
        }
    </script>
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
            <h2>User informatie</h2>
            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" required><br>

            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" required><br>

            <label for="geslacht">Geslacht:</label>
            <select id="geslacht" name="geslacht" required>
                <option value="man">Man</option>
                <option value="vrouw">Vrouw</option>
            </select><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="gebruikersnaam">Username:</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam" required><br>

            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required><br>

            <label for="rol">Rol:</label>
            <select id="rol" name="rol" onchange="toggleEmployeeInfo()" required>
                <option value="klant">klant</option>
                <option value="werknemer">werknemer</option>
            </select><br>

            <!-- Address Information -->
            <h2>Address informatie</h2>
            <label for="straat">Straat:</label>
            <input type="text" id="straat" name="straat" required><br>

            <label for="huisnummer">Huis nummer:</label>
            <input type="text" id="huisnummer" name="huisnummer" required><br>

            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" required><br>

            <label for="plaats">Plaats:</label>
            <input type="text" id="plaats" name="plaats" required><br>

            <label for="land">Land:</label>
            <input type="text" id="land" name="land" required><br>

            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="text" id="telefoonnummer" name="telefoonnummer"><br>

            <label for="mobielnummer">Mobielnummer:</label>
            <input type="text" id="mobielnummer" name="mobielnummer"><br>

            <!-- Employee Information -->
            <div id="Werknemer-info" style="display: none;">
                <h2>Werknemer informatie</h2>
                <label for="werk_titel">Werk titel:</label>
                <input type="text" id="werk_titel" name="werk_titel"><br>
            </div>

            <button type="submit">Registreer</button>
        </form>
    </main>
</body>
</html>
