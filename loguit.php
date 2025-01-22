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
        <div class="pagina_titel"><H2>UITLOGGEN</H2></div>
        <div><button class="terug_knop"><a href="index.php">back</a></button></div>
        <label id="minutes">00</label>:<label id="seconds">00</label>
    </header>
    <main>
    <section class="loguit_veld">
            <div class="loguit">
                <button class="loguit_button">log uit</button>
                <div class="zekerheids_check">
                    <p>weet u zeker dat u wilt uitloggen?</p>
                    <button class="niet_zeker">Nee</button>
                    <form method="POST" action="loguit_process.php">
                        <button type="submit" class="wel_zeker">Ja</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="scripts.js"></script>
</body>
</html>