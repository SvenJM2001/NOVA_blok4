<?php
include "connection.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['gebruikersnaam'];
    $pass = $_POST['wachtwoord'];

    if (!empty($user) && !empty($pass)) {
        // Fetch user from database
        $sql = "SELECT * FROM users WHERE gebruikersnaam = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $userRecord = $result->fetch_assoc();

        if ($userRecord && password_verify($pass, $userRecord['wachtwoord'])) {
            // Authentication successful
            $_SESSION['user_id'] = $userRecord['id'];
            $_SESSION['gebruikersnaam'] = $userRecord['gebruikersnaam'];

            // Redirect to the index page
            header("Location: index.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
