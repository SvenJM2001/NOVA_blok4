<?php
include "connection.php";
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
    <?php
    include 'header.php';
    ?>
    <main>
      <section class="info_display">
        <h3>User Info</h3>
        <div><?php echo $_SESSION['gebruikersnaam'] ?></div>
      </section>
      <section class="info_display">
        <h3>adress info</h3>

      </section>
      <form action="loguit.php" method="post">
          <button type="submit">Uitloggen</button>
      </form>
    </main>
</body>
</html>