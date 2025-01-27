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

    <?php
    if (!isset($_SESSION['gebruikersnaam'])) {
      header("Location: login.php");
      exit();
    }

    $gebruikersnaam = $_SESSION['gebruikersnaam'];

    $query = "SELECT u.voornaam, u.achternaam, u.email, u.geslacht, u.gebruikersnaam, a.straat, a.huisnummer, a.postcode, a.plaats, a.land, a.mobielnummer, a.telefoonnummer
              FROM users u
              LEFT JOIN adres a ON u.id = a.user_id
              WHERE u.gebruikersnaam = ?";
              
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Geen gegevens gevonden voor deze gebruiker.";
        exit();
    }
    ?>
    <main class="profiel_display">
      <section class="info_display">
        <h3>User Info</h3>
          <div>
              <p><strong>Gebruikersnaam: </strong><?php echo $row['gebruikersnaam']; ?></p>
              <p><strong>Voornaam: </strong><?php echo $row['voornaam']; ?></p>
              <p><strong>Achternaam: </strong><?php echo $row['achternaam']; ?></p>
              <p><strong>Email: </strong><?php echo $row['email']; ?></p>
              <p><strong>Geslacht: </strong><?php echo $row['geslacht']; ?></p>
          </div>
      </section>
      <section class="info_display">
        <h3>Address Info</h3>
        <div>
            <p><strong>Straat: </strong><?php echo $row['straat']; ?></p>
            <p><strong>Huisnummer: </strong><?php echo $row['huisnummer']; ?></p>
            <p><strong>Postcode: </strong><?php echo $row['postcode']; ?></p>
            <p><strong>Plaats: </strong><?php echo $row['plaats']; ?></p>
            <p><strong>Land: </strong><?php echo $row['land']; ?></p>
            <p><strong>Mobielnummer: </strong><?php echo $row['mobielnummer']; ?></p>
            <p><strong>Telefoonnummer: </strong><?php echo $row['telefoonnummer']; ?></p>
        </div>
      </section>
        <form action="loguit.php" method="post">
            <button class="profiel_loguit" type="submit">Uitloggen</button>
        </form>
    </main>
</body>
</html>