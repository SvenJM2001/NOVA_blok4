<?php
include "connection.php";
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
    <?php
    include 'header.php';
    ?>
    <main>
        <div class="banner">
            <div>
                <h2>Word nu lid</h2>
                <button class="register" onclick="window.location.href = 'register.php';">Lid Worden</button>
            </div>
        </div>
        
    </main>
    <script src="scripts.js"></script>
</body>
</html>