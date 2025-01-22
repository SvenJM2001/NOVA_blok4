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
        <div><H1>Work4Me</H1></div>
        <div class="pagina_titel"><H2>INLOGGEN</H2></div>
        <div><button class="terug_knop"><a href="index.php">back</a></button></div>
    </header>
    <main>
        <section>
            <div class="inloggen">
                <form action="login_process.php" method="POST">
                    <input class="login_box" type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="Username" required>
                    <input class="login_box" type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" required>
                    <button type="submit" class="login_button">Inloggen</button>
                </form>
                <p class="or">Or</p>
                <p>Ik ben nieuw bij Work4Me. <a class="register" href="register.php">Maak een account aan</a></p>
            </div>
        </section>
    </main>
</body>
</html>