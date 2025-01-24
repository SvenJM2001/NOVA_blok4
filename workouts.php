<?php
include "connection.php"
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me_workouts</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <script src="scripts.js"></script>
    <main id="workouts">
        <?php
        $sql = "SELECT titel, beschrijving, notities, tijdsduur, afbeelding FROM workouts";
        $result = $conn->query($sql);

        // Controleer of er resultaten zijn
        if ($result->num_rows > 0) {
            // Loop door de resultaten en toon ze
            while($row = $result->fetch_assoc()) {
                echo "<section class='workout'>";
                // Toon afbeelding als deze bestaat
                if (!empty($row["afbeelding"])) {
                    echo "<img src='Images/" . htmlspecialchars($row["afbeelding"]) . "' alt='" . htmlspecialchars($row["titel"]) . "'>";
                }
                echo "<h2>" . htmlspecialchars($row["titel"]) . "</h2>";
                echo "<p><strong>Beschrijving:</strong> " . htmlspecialchars($row["beschrijving"]) . "</p>";
                echo "<p class='notities'><strong>Notities:</strong> " . htmlspecialchars($row["notities"]) . "</p>";
                echo "<p><strong>Tijdsduur:</strong> " . htmlspecialchars($row["tijdsduur"]) . " minuten</p>";

                echo "</section>";
            }
        } else {
            echo "Geen workouts gevonden.";
        }
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'werknemer') {
        ?>
            <section class="workout_form">
                <form id="workout_toevoegen" action="workouts_toevoegen.php" method="post" enctype="multipart/form-data">
                    <label for="titel">Titel:</label><input id="titel" type="text" name="titel"><br>
                    <label for="beschrijving">Beschrijving:</label><textarea id="beschrijving" name="beschrijving"></textarea><br>
                    <label for="notities">Notities:</label><textarea id="notities" name="notities"></textarea><br>
                    <label for="tijdsduur">Tijdsduur (hh:mm:ss):</label><input id="tijdsduur" type="time" name="tijdsduur" step="1"><br>
                    <label for="afbeelding">Afbeelding:</label><input id="afbeelding" type="file" name="afbeelding"><br>
                    <button class="workout_submit" type="submit">Workout toevoegen</button>
                </form>
            </section>
        <?php
        } else {

        }
        ?>

    </main>
</body>
</html>