<?php
include 'db_config.php';

// Check the action
if ($_GET['action'] === 'get_years') {
    // Fetch unique years from the database
    $query = "SELECT DISTINCT year FROM dengue_cases_2022_2024 ORDER BY year";
    $result = $conn->query($query);

    $years = [];
    while ($row = $result->fetch_assoc()) {
        $years[] = $row['year'];
    }

    // Return as JSON
    echo json_encode($years);
    exit;
}

if ($_GET['action'] === 'get_data') {
    // Fetch data for the selected year
    $year = $_GET['year'];
    $query = "SELECT month, SUM(cases) AS cases FROM dengue_cases_2022_2024 WHERE year = $year GROUP BY FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')";
    $result = $conn->query($query);

    $labels = [];
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['month'];
        $data[] = $row['cases'];
    }

    // Return as JSON
    echo json_encode(['labels' => $labels, 'data' => $data]);
    exit;
}
?>
