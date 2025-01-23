<?php
session_start();
?>
<header>
  <a href="index.php"><div><H1>Work<span>4</span>Me</H1></div></a>
  <nav>
    <label id="minutes">00</label>:<label id="seconds">00</label>
    <ul>
      <li><a class="nav" href="workouts.php">Workouts</a></li>
      <li><a class="nav" href="data.php">Data</a></li>
      <?php
      if(isset($_SESSION['gebruikersnaam'])){
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
  <div class="dropdown">
    <button class="dropdown_button">Mijn account</button>
    <ul class="dropdown_content">
        <li><a href="#">Mijn gegevens</a></li>
        <li><button id="login_button" onclick="window.location.href = 'login.php';">Login</button></li>
        <li><button id="loguit_button" onclick="window.location.href = 'loguit.php';">Log uit</button></li>
      </ul>
    </div>
  </nav>
</header>