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

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display user details
        echo "User ID: " . $row['user_id'] . "<br>";
        echo "Name: " . $row['voornaam'] . " " . $row['achternaam'] . "<br>";
        echo "Gender: " . $row['geslacht'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Username: " . $row['gebruikersnaam'] . "<br>";
        echo "Role: " . $row['rol'] . "<br>";

        // Display address details
        if ($row['straat'] || $row['huisnummer'] || $row['postcode'] || $row['plaats'] || $row['land']) {
            echo "Address: " . $row['straat'] . " " . $row['huisnummer'] . ", " . $row['postcode'] . ", " . $row['plaats'] . ", " . $row['land'] . "<br>";
            echo "Phone: " . ($row['telefoonnummer'] ?? "N/A") . "<br>";
            echo "Mobile: " . ($row['mobielnummer'] ?? "N/A") . "<br>";
        } else {
            echo "Address: No address available.<br>";
        }

        // Display customer details
        if ($row['klantnummer']) {
            echo "Customer Number: " . $row['klantnummer'] . "<br>";
            echo "Last Login Date: " . ($row['Laatste_login_datum'] ?? "N/A") . "<br>";
        } else {
            echo "Customer Info: N/A<br>";
        }

        // Display employee details
        if ($row['begin_datum'] || $row['baan_titel']) {
            echo "Employee Start Date: " . ($row['begin_datum'] ?? "N/A") . "<br>";
            echo "Job Title: " . ($row['baan_titel'] ?? "N/A") . "<br>";
        } else {
            echo "Employee Info: N/A<br>";
        }

        echo "<hr>"; // Separate each user
    }
} else {
    echo "No results found.";
}

$conn->close();
?>
