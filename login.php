<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header class="fixed">
        <div><H1>Work<span>4</span>Me</H1></div>
        <div class="pagina_titel"><H2>INLOGGEN</H2></div>
        <div><button class="terug_knop"><a href="index.php">back</a></button></div>
    </header>
    <main>
        <section>
            <div class="inloggen">
                <form method="POST" action="login_process.php">
                    <input class="login_box" type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="Username" required>
                    <input class="login_box" type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" required>
                    <input type="checkbox" id="ingelogd_blijven" name="ingelogd_blijven"> 
                    <label for="ingelogd_blijven">Blijf ingelogd</label>
                    <button class="login_button" type="submit">Inloggen</button>
                    <p class="or">Or</p>
                    <p>Ik ben nieuw bij Work4Me. <a class="naar_register" href="register.php">Maak een account aan</a></p>
                </form>
            </div>
        </section>
    </main>
</body>
</html>