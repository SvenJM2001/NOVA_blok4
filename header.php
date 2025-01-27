<?php
session_start();
include 'connection.php'; // Zorg ervoor dat je verbinding hebt met de database

// Controleer of de gebruiker is ingelogd
if (isset($_SESSION['gebruikersnaam'])) {
    // Haal de rol van de ingelogde gebruiker op
    $gebruikersnaam = $_SESSION['gebruikersnaam'];
    $query = "SELECT rol FROM users WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $result = $stmt->get_result();

    // Als de gebruiker bestaat, haal de rol op
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rol = $row['rol'];
    } else {
        $rol = '';
    }
} else {
    $rol = '';
}
?>
<header>
  <a href="index.php"><div><H1>Work<span>4</span>Me</H1></div></a>
  <nav>
    <label id="minutes">00</label>:<label id="seconds">00</label>
    <ul>
      <li><a class="nav" href="workouts.php">Workouts</a></li>
      <?php if ($rol === 'werknemer') { ?>
          <li><a class="nav" href="gebruikers.php">Users</a></li>
      <?php } ?>
      <li><a class="nav" href="data.php">Data</a></li>
      <li><a class="nav" href="over_ons.php">Over Ons</a></li>
        <div class="dropdown">
          <button class="dropdown_button">
            <?php
              if(isset($_SESSION['gebruikersnaam'])){
            ?>
            <a href="profiel.php"><?php echo $_SESSION['gebruikersnaam'] ?></a>
            <?php
              } else {
            ?>
            <a href="login.php">Inloggen</a>
            <?php
              }
            ?>
          </button>
          <ul class="dropdown_content">
            <li><a href="profiel.php">Mijn gegevens</a></li>
            <?php
              if(isset($_SESSION['gebruikersnaam'])){
            ?>
            <li><button id="loguit_button" onclick="window.location.href = 'loguit.php';">Log uit</button></li>
            <?php
              } else {
            ?>
            <li><button id="login_button" onclick="window.location.href = 'login.php';">Login</button></li>
            <?php
              }
            ?>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
</header>