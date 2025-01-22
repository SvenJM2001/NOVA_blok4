<?php
include "connection.php";

// Start de sessie om toegang te krijgen tot de sessiegegevens
session_start();

// Verwijder alle sessievariabelen
session_unset();

// Vernietig de sessie
session_destroy();

// Redirect de gebruiker naar de inlogpagina of homepagina
header("Location: index.php"); // Of een andere pagina, zoals index.php
exit();
?>