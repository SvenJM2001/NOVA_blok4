<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me_Data</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" type="text/javascript"></script>
</head>
<body>
    <?php
    include 'header.php';
    ?>

    <main>
        <section>
            <div class="users-data">
                <?php
                include 'get_users.php';

                $cities = [];
                $totalUsers = 0;
                $loginMonths = array_fill(1, 12, 0); // Array to track logins per month

                $tableRows = ''; // Store table rows as a string

                // Process the rows to collect city counts and generate table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Count the cities
                        $city = $row['plaats'];
                        $cities[$city] = ($cities[$city] ?? 0) + 1;
                        $totalUsers++;

                        // Track logins by month
                        if (!empty($row['laatste_login_datum'])) {
                            $loginMonth = (int)date('n', strtotime($row['laatste_login_datum']));
                            $loginMonths[$loginMonth]++;
                        }

                        // Generate table rows
                        $tableRows .= '<tr>';
                        $tableRows .= '<td>' . htmlspecialchars($row['voornaam'] . ' ' . $row['achternaam']) . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['geslacht']) . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['email']) . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['gebruikersnaam']) . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['rol']) . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['straat'] . ' ' . $row['huisnummer'] . ', ' . $row['postcode'] . ', ' . $row['plaats'] . ', ' . $row['land']) . '</td>';
                        $tableRows .= '<td>0' . htmlspecialchars($row['telefoonnummer']) . '</td>';
                        $tableRows .= '<td>0' . htmlspecialchars($row['mobielnummer']) . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['klantnummer'] ?? 'N/A') . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['laatste_login_datum'] ?? 'N/A') . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['start_datum'] ?? 'N/A') . '</td>';
                        $tableRows .= '<td>' . htmlspecialchars($row['werk_titel'] ?? 'N/A') . '</td>';
                        $tableRows .= '</tr>';
                    }

                    // Convert cities and their percentages to JSON
                    $cityLabels = json_encode(array_keys($cities));
                    $cityPercentages = json_encode(array_map(function($count) use ($totalUsers) {
                        return round(($count / $totalUsers) * 100, 2);
                    }, array_values($cities)));

                    // Convert login months data to JSON
                    $loginData = json_encode(array_values($loginMonths));
                }
                ?>

                <?php if ($result->num_rows > 0): ?>
                    <table class="data">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Mobile</th>
                                <th>Customer Number</th>
                                <th>Last Login</th>
                                <th>Employee Start Date</th>
                                <th>Job Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $tableRows ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No results found.</p>
                <?php endif; ?>
            </div>
        </section>
        <section class="tabellen">
            <div class="user_login_data">
                <canvas id="loginDataChart" style="width:100%; max-width:700px"></canvas>
                <script>
                    const loginXValues = ["Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"];
                    const loginYValues = <?= $loginData ?>;
                    var loginDataChart 
                    loginDataChart = new Chart("loginDataChart", {
                        type: "line",
                        data: {
                            labels: loginXValues,
                            datasets: [{
                                backgroundColor: "rgb(0, 109, 199, 1.0)",
                                borderColor: "rgb(0, 109, 199, 0.5)",
                                data: loginYValues,
                                fill: false
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Logins per Maand"
                            }
                        }
                    });
                </script>
            </div>
            <div class="user_location_data">
                <canvas id="locationDataChart" style="width:100%; max-width:700px"></canvas>
                <script>
                    // Get data from PHP
                    const locationXValues = <?= $cityLabels ?>;
                    const locationYValues = <?= $cityPercentages ?>;
                    const barColors = ["red", "green", "pink", "blue", "yellow", "purple", "orange", "gray"];

                    // Create the pie chart
                    new Chart("locationDataChart", {
                        type: "pie",
                        data: {
                            labels: locationXValues,
                            datasets: [{
                                backgroundColor: barColors.slice(0, locationXValues.length),
                                data: locationYValues
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: "Percentage van gebruikers per locatie"
                            }
                        }
                    });
                </script>
            </div>
        </section>
    </main>
    <script src="scripts.js"></script>
</body>
</html>
