<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work4Me_Data</title>
    <link rel="stylesheet" href="data.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="workouts.php">Workouts</a></li>
                <li><a class="register" href="register.php">Registreren</a></li>
            </ul>
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
    </main>
</body>
</html>
