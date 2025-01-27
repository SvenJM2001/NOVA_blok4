<?php
include 'connection.php';

// Controleer of er een 'id' parameter in de URL zit
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // SQL-query om de gegevens van de gebruiker op te halen op basis van de id
    $query = "
        SELECT u.id, u.voornaam, u.achternaam, u.email, u.geslacht, u.gebruikersnaam,
               a.straat, a.huisnummer, a.postcode, a.plaats, a.land, a.mobielnummer, a.telefoonnummer
        FROM users u
        LEFT JOIN adres a ON u.id = a.user_id
        WHERE u.id = ?;
    ";

    // Prepare en voer de query uit
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);  // 'i' is voor een integer type
    $stmt->execute();
    $result = $stmt->get_result();

    // Als er geen resultaten zijn, laat een bericht zien
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Geen gegevens gevonden voor deze gebruiker.";
        exit();
    }
} else {
    echo "Geen gebruiker geselecteerd.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="profiel_display">
        <section class="info_display">
            <h3>User Info</h3>
            <div>
                <strong>Gebruikersnaam: </strong> <p></p><?php echo htmlspecialchars($row['gebruikersnaam']); ?>
                <strong>Voornaam: </strong> <p></p><?php echo htmlspecialchars($row['voornaam']); ?>
                <strong>Achternaam: </strong> <p></p><?php echo htmlspecialchars($row['achternaam']); ?>
                <strong>Email: </strong> <p></p><?php echo htmlspecialchars($row['email']); ?>
                <strong>Geslacht: </strong> <p></p><?php echo htmlspecialchars($row['geslacht']); ?>
            </div>
        </section>
        
        <section class="info_display">
            <h3>Address Info</h3>
            <div>
                <strong>Straat: </strong> <p><?php echo htmlspecialchars($row['straat']); ?></p>
                <strong>Huisnummer: </strong> <p><?php echo htmlspecialchars($row['huisnummer']); ?></p>
                <strong>Postcode: </strong> <p><?php echo htmlspecialchars($row['postcode']); ?></p>
                <strong>Plaats: </strong> <p><?php echo htmlspecialchars($row['plaats']); ?></p>
                <strong>Land: </strong> <p><?php echo htmlspecialchars($row['land']); ?></p>
                <strong>Mobielnummer: </strong> <p><?php echo htmlspecialchars($row['mobielnummer']); ?></p>
                <strong>Telefoonnummer: </strong> <p><?php echo htmlspecialchars($row['telefoonnummer']); ?></p>
            </div>
        </section>
        
        <form action="loguit.php" method="post">
            <button type="submit">Uitloggen</button>
        </form>
    </main>
</body>
</html>