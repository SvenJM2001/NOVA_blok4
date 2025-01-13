<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'workouts';

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}