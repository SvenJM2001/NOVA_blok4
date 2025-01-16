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
        <H1>Work4Me</H1>
        <H2>INLOGGEN</H2>
        <button class="terug_knop"><a href="index.php">back</a></button>
    </header>
    <main>
        <section>
            <div class="inloggen">
                <input class="login_box" type="email" id="email" name="email" placeholder="E-mail" required>
                <input class="login_box" type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" required>
                <input type="checkbox" id="ingelogd_blijven" name="ingelogd_blijven"> 
                <label for="ingelogd_blijven">Blijf ingelogd</label>
                <button class="login_button">Inloggen</button>
                <p class="or">Or</p>
                <p>Ik ben nieuw bij Work4Me. <a class="register" href="register.php">Maak een account aan</a></p>
            </div>
        </section>
    </main>
</body>
</html>