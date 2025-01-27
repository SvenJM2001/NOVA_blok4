<?php
include 'connection.php';

// Haal de zoekterm uit de URL, indien aanwezig
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// SQL-query om gebruikers te zoeken op achternaam of email
$sql = "
    SELECT id, voornaam, achternaam, rol
    FROM users     
    WHERE rol != 'werknemer'
    AND (achternaam LIKE ? OR email LIKE ?)
";


// Prepare en execute de query met de zoekterm
$stmt = $conn->prepare($sql);
$searchTermWithWildcards = "%" . $searchTerm . "%"; // Voeg wildcards toe voor gedeeltelijke zoekopdrachten
$stmt->bind_param("ss", $searchTermWithWildcards, $searchTermWithWildcards);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me_Data</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php
    include 'header.php';
    ?>

    <main>
        <!-- Zoekformulier -->
        <form id="zoek_gebruikers" method="get" action="gebruikers.php">
            <input type="text" name="search" placeholder="Zoek op achternaam of email..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit">Zoeken</button>
        </form>

        <section>
            <div class="users-data">
                <?php
                // Controleer of er zoekresultaten zijn
                if ($result->num_rows > 0) {
                    echo '<table>';
                    echo '<thead><tr><th>Naam</th></tr></thead>';
                    echo '<tbody>';
                    
                    // Loop door de zoekresultaten
                    while ($row = $result->fetch_assoc()) {

                        // Toon de ID van de gebruiker voor debugging
                        echo 'User ID: ' . $row['id']; 

                        // Toon de resultaten in een tabel
                        echo '<tr>';
                        echo '<td><a href="gebruiker.php?id=' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['voornaam'] . ' ' . $row['achternaam']) . '</a></td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo "<p>Geen gebruikers gevonden met deze zoekterm.</p>";
                }
                ?>
            </div>
        </section>
    </main>
    <script src="scripts.js"></script>
</body>
</html>