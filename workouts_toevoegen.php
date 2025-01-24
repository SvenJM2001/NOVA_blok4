<?php
include "connection.php";

// Check of er een bestand is geüpload
if (isset($_FILES['afbeelding']) && $_FILES['afbeelding']['error'] == 0) {
    // Definieer de map waar de afbeelding opgeslagen moet worden
    $target_dir = "Images/";
    $target_file = $target_dir . basename($_FILES["afbeelding"]["name"]);

    // Verplaats het bestand naar de juiste map
    if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target_file)) {
        echo "Het bestand " . basename($_FILES["afbeelding"]["name"]) . " is geüpload.";

        // Verkrijg de overige gegevens uit het formulier
        $titel = $_POST['titel'];
        $beschrijving = $_POST['beschrijving'];
        $notities = $_POST['notities'];
        $tijdsduur = $_POST['tijdsduur'];
        $afbeelding = basename($_FILES["afbeelding"]["name"]); // Bewaar alleen de bestandsnaam
        $wanneer_toegevoegd = date('Y-m-d H:i:s');

        // SQL query om de gegevens in de database op te slaan
        $sql = "INSERT INTO workouts (titel, beschrijving, notities, tijdsduur, afbeelding, wanneer_toegevoegd) 
                VALUES ('$titel', '$beschrijving', '$notities', '$tijdsduur', '$afbeelding', '$wanneer_toegevoegd')";

        if ($conn->query($sql) === TRUE) {
            echo "Nieuwe workout succesvol toegevoegd!";
        } else {
            echo "Fout: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Er is een fout opgetreden bij het uploaden van het bestand.";
    }
}

$conn->close();

// Redirect to the workouts page
header("Location: workouts.php");
exit();
?>