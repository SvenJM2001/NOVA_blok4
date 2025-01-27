<?php
include "connection.php";
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
        <!-- Zoeken en filteren formulier -->
        <section class="zoek_filter">
            <form method="get" action="workouts.php">
                <button type="submit">Zoeken</button>
                <input type="text" name="zoekterm" placeholder="Zoek workout..." value="<?php echo isset($_GET['zoekterm']) ? htmlspecialchars($_GET['zoekterm']) : ''; ?>">
                
                <!-- Filteropties (bijvoorbeeld filteren op tijdsduur) -->
                <select name="filter_tijdsduur">
                    <option value="">Selecteer tijdsduur</option>
                    <option value="short" <?php echo isset($_GET['filter_tijdsduur']) && $_GET['filter_tijdsduur'] == 'short' ? 'selected' : ''; ?>>Kort (<= 30 min)</option>
                    <option value="medium" <?php echo isset($_GET['filter_tijdsduur']) && $_GET['filter_tijdsduur'] == 'medium' ? 'selected' : ''; ?>>Middel (30-60 min)</option>
                    <option value="long" <?php echo isset($_GET['filter_tijdsduur']) && $_GET['filter_tijdsduur'] == 'long' ? 'selected' : ''; ?>>Lang (> 60 min)</option>
                </select>
            </form>
        </section>

        <?php
        // Basis SQL-query voor alle workouts
        $sql = "SELECT titel, beschrijving, notities, tijdsduur, afbeelding FROM workouts WHERE 1";

        // Zoekterm filter
        if (isset($_GET['zoekterm']) && !empty($_GET['zoekterm'])) {
            $zoekterm = "%" . $_GET['zoekterm'] . "%";
            $sql .= " AND titel LIKE ?"; // Filter op titel
        }

        // Filteren op tijdsduur
        if (isset($_GET['filter_tijdsduur']) && $_GET['filter_tijdsduur'] !== "") {
            if ($_GET['filter_tijdsduur'] == 'short') {
                $sql .= " AND tijdsduur <= 30"; // Korter dan of gelijk aan 30 minuten
            } elseif ($_GET['filter_tijdsduur'] == 'medium') {
                $sql .= " AND tijdsduur BETWEEN 30 AND 60"; // Tussen 30 en 60 minuten
            } elseif ($_GET['filter_tijdsduur'] == 'long') {
                $sql .= " AND tijdsduur > 60"; // Langer dan 60 minuten
            }
        }

        // Bereid de query
        $stmt = $conn->prepare($sql);

        // Bind de zoekterm als dat nodig is
        if (isset($zoekterm)) {
            $stmt->bind_param("s", $zoekterm);
        }

        // Voer de query uit
        $stmt->execute();
        $result = $stmt->get_result();

        // Sla de resultaten op in een array zodat we ze later kunnen hergebruiken
        $workouts = [];
        while ($row = $result->fetch_assoc()) {
            $workouts[] = $row;
        }

        // Als de gebruiker de rol 'werknemer' heeft, toon de tabel
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'werknemer') {
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>Titel</th><th>Beschrijving</th><th>Notities</th><th>Tijdsduur</th><th>Afbeelding</th></tr>";
            echo "</thead>";
            echo "<tbody>";

            // Toon de workouts in de tabel
            foreach ($workouts as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["titel"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["beschrijving"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["notities"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tijdsduur"]) . " minuten</td>";
                echo "<td>";
                if (!empty($row["afbeelding"])) {
                    echo "<img src='Images/" . htmlspecialchars($row["afbeelding"]) . "' alt='" . htmlspecialchars($row["titel"]) . "' width='100'>";
                } else {
                    echo "Geen afbeelding";
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }

        // Toon de workouts in secties voor iedereen
        if (count($workouts) > 0) {
            foreach ($workouts as $row) {
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

        // Formulier voor het toevoegen van een workout (alleen voor werknemers)
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'werknemer') {
        ?>
            <section class="workout_form">
                <form id="workout_toevoegen" action="workouts_toevoegen.php" method="post" enctype="multipart/form-data">
                    <label for="titel">Titel:</label><input id="titel" type="text" name="titel" required><br>
                    <label for="beschrijving">Beschrijving:</label><textarea id="beschrijving" name="beschrijving" required></textarea><br>
                    <label for="notities">Notities:</label><textarea id="notities" name="notities" required></textarea><br>
                    <label for="tijdsduur">Tijdsduur (hh:mm:ss):</label><input id="tijdsduur" type="time" name="tijdsduur" step="1" required><br>
                    <label for="afbeelding">Afbeelding:</label><input id="afbeelding" type="file" name="afbeelding" required><br>
                    <button class="workout_submit" type="submit">Workout toevoegen</button>
                </form>
            </section>
        <?php
        }
        ?>
    </main>
</body>
</html>