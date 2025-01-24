<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Haal de ingevoerde gegevens op
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    // Zoek naar de gebruiker in de database
    $sql = "SELECT id, gebruikersnaam, wachtwoord, rol FROM users WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die('Error in prepare statement: ' . $conn->error);
    }
    
    $stmt->bind_param('s', $gebruikersnaam);
    $stmt->execute();
    $result = $stmt->get_result();

    // Als de gebruiker wordt gevonden
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Controleer of het ingevoerde wachtwoord klopt
        if (password_verify($wachtwoord, $row['wachtwoord'])) {
            // Sessie starten
            session_start();

            // Zet de sessiegegevens
            $_SESSION['gebruikersnaam'] = $gebruikersnaam;
            $_SESSION['id'] = $row['id'];
            $_SESSION['rol'] = $row['rol'];


            // Update de laatste inlogdatum in de klanten tabel
            $laatste_login_datum = date('Y-m-d H:i:s'); // Huidige datum en tijd

            // SQL-query voor het bijwerken van de laatste inlogdatum
            $updateSql = "UPDATE klanten SET laatste_login_datum = ? WHERE user_id = ?";
            $updateStmt = $conn->prepare($updateSql);
            
            if ($updateStmt === false) {
                die('Error in prepare statement for update: ' . $conn->error);
            }

            // Bind de parameters (de datum en de gebruikers-ID)
            $updateStmt->bind_param('si', $laatste_login_datum, $row['id']);
            $updateSuccess = $updateStmt->execute();
            
            if (!$updateSuccess) {
                die('Error in executing update: ' . $updateStmt->error);
            } else {
                echo "update success";
            }
        } else {
            echo "onjuist wachtwoord";
        }

        // Redirect naar de homepagina of een andere pagina
        header("Location: index.php");
        exit();
    } else {
        echo "Gebruiker niet gevonden!";
    }
}
?>