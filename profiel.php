<?php
include "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Work4Me</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <header class="with_image">
        <div><H1>Work<span>4</span>Me</H1></div>
        <nav>
            <ul>
                <li><a class="nav" href="index.php">Home</a></li>
                <li><a class="nav" href="workouts.php">Workouts</a></li>
                <li><a class="nav" href="data.php">Data</a></li>
                <?php
                if($_SESSION['gebruikersnaam']){
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
        </nav>
    </header>
    <main>
      <form action="logout.php" method="post">
          <button type="submit">Uitloggen</button>
      </form>
    </main>
</body>
</html>