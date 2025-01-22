<?php
session_start();
header('Content-Type: application/json');

// Controleer of de gebruiker ingelogd is
if (isset($_SESSION['gebruikersnaam'])) {
    echo json_encode(['loggedIn' => true]);
} else {
    echo json_encode(['loggedIn' => false]);
}
?>