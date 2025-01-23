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
      <li>
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
            <li><a href="#">Mijn gegevens</a></li>
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