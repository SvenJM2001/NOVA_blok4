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
      <form action="loguit.php" method="post">
          <button type="submit">Uitloggen</button>
      </form>
    </main>
</body>
</html>