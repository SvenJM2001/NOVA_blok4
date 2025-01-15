<?php
include 'connection.php';

// Query
$sql = "
  SELECT *
  FROM 
      users
  LEFT JOIN adres ON adres.user_id = users.id
  LEFT JOIN klanten ON klanten.user_id = users.id
  LEFT JOIN werknemers ON werknemers.user_id = users.id;
";

$result = $conn->query($sql);

$conn->close();