<?php
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "smart_irrigation"; // Your database name


try {
    // Create a PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $moistureThreshold = $_POST['moistureThreshold'];
        $irrigationTime = $_POST['irrigationTime'];
        $irrigationDuration = $_POST['irrigationDuration'];
        $weatherCondition = $_POST['weatherCondition'];

        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO settings (moisture_threshold, irrigation_time, irrigation_duration, weather_condition) VALUES (?, ?, ?, ?)");
        $stmt->execute([$moistureThreshold, $irrigationTime, $irrigationDuration, $weatherCondition]);

        echo "Settings saved successfully.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
