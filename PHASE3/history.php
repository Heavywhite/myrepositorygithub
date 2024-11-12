<?php
// Database connection settings
include "db_connect.php";

try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch history from the database
    $stmt = $pdo->query("SELECT * FROM settings ORDER BY created_at DESC");
    $settingsHistory = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="history.css">
</head>
<body>
<div class="container">
<a class="navbar-brand" href="#">
            <img src="smart irrigation.svg" alt="logo" width="100"/>
            </a>
    <h2 class="mt-4">Irrigation Settings History</h2>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Moisture Threshold (%)</th>
                <th>Irrigation Time</th>
                <th>Irrigation Duration (minutes)</th>
                <th>Weather Condition</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($settingsHistory)): ?>
                <?php foreach ($settingsHistory as $setting): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($setting['id']); ?></td>
                        <td><?php echo htmlspecialchars($setting['moisture_threshold']); ?></td>
                        <td><?php echo htmlspecialchars($setting['irrigation_time']); ?></td>
                        <td><?php echo htmlspecialchars($setting['irrigation_duration']); ?></td>
                        <td><?php echo htmlspecialchars($setting['weather_condition']); ?></td>
                        <td><?php echo htmlspecialchars($setting['created_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No history available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn btn-primary mt-3">Back to Dashboard</a>
</div>

</body>
</html>