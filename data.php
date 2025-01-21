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
    <header>
        <div><H1>Work<span>4</span>Me</H1></div>
        <nav>
            <label id="minutes">00</label>:<label id="seconds">00</label>
            <ul>
                <li><a class="nav" href="index.php">Home</a></li>
                <li><a class="nav" href="workouts.php">Workouts</a></li>
                <li><a class="nav" href="#">Data</a></li>
            </ul>
            <div class="dropdown">
                <button class="dropdown_button">Mijn account</button>
                <ul class="dropdown_content">
                    <li><a href="#">Mijn gegevens</a></li>
                    <li><a href="login.php">Inloggen</a></li>
                    <li><a href="#">Uitloggen</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="users-data">
                <?php
                include 'get_users.php';

                if ($result->num_rows > 0): ?>
                    <table>
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
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['voornaam'] . ' ' . $row['achternaam']) ?></td>
                                    <td><?= htmlspecialchars($row['geslacht']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['gebruikersnaam']) ?></td>
                                    <td><?= htmlspecialchars($row['rol']) ?></td>
                                    <td>
                                        <?= htmlspecialchars($row['straat'] . ' ' . $row['huisnummer'] . ', ' . $row['postcode'] . ', ' . $row['plaats'] . ', ' . $row['land']) ?>
                                    </td>
                                    <td><?= htmlspecialchars($row['telefoonnummer']) ?></td>
                                    <td><?= htmlspecialchars($row['mobielnummer']) ?></td>
                                    <td><?= htmlspecialchars($row['klantnummer'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($row['Laatste_login_datum'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($row['start_datum'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($row['werk_titel'] ?? 'N/A') ?></td>
                                </tr>
                            <?php endwhile; ?>
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
                    const loginXValues = ["Januarie","Februarie","Maart","April","Mei","Juni","Julie","Augustus","September","Oktober","November","December"];
                    var loginYValues = [50,26,47,53,35,46,19,23,28,43,52,22];
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
                        options: {}
                    });
                </script>
            </div>
            <div class="user_location_data">
                <canvas id="locationDataChart" style="width:100%; max-width:700px"></canvas>
                <script>
                    const locationXvalues = ["Haarlem","Rotterdam","Amsterdam","Alkmaar","Ijmuiden","Hoofddorp"];
                    const barColors = ["red","green","pink","blue","yellow","purple"];
                    var locationYValues = [25,15,30,12,10,16];
                    var locationDataChart
                    locationDataChart = new Chart ("locationDataChart", {
                        type: "pie",
                        data: {
                            labels: locationXvalues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: locationYValues
                            }]
                        },
                        options: {
                            title: { 
                                display: true,
                                text: "Locatie van gebruikers"
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
