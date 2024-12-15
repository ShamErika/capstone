<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "dengue_cases");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch combined predictions
$sql = "SELECT month, Combined FROM dengue_predictions_2025";
$result = $conn->query($sql);

$months = [];
$combined = [];

while ($row = $result->fetch_assoc()) {
    $months[] = $row['month'];
    $combined[] = $row['Combined'];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dengue Predictions for 2025</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Dengue Case Predictions for 2025</h2>
    <canvas id="predictionsChart" width="800" height="400"></canvas>

    <script>
        const ctx = document.getElementById('predictionsChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($months); ?>,
                datasets: [
                    {
                        label: 'Combined Predictions',
                        data: <?php echo json_encode($combined); ?>,
                        borderColor: 'blue',  // You can use any color for the combined prediction line
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
