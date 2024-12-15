<?php
include 'db_config.php';

// Fetch data for a specific year
$year = 2022; // Change dynamically or allow user selection
$query = "SELECT month, cases FROM dengue_cases_2022_2024 WHERE year = $year ORDER BY FIELD(month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')";
$result = $conn->query($query);

// Prepare data for Chart.js
$months = [];
$cases = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $months[] = $row['month'];
        $cases[] = $row['cases'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dengue Cases Line Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Dengue Cases Line Graph</h1>

    <!-- Dropdown for selecting year -->
    <label for="year">Select Year:</label>
    <select id="year">
        <!-- Years will be populated here -->
    </select>

    <!-- Canvas for chart -->
    <canvas id="lineChart" width="400" height="200"></canvas>

    <script>
        let currentChart = null; // To hold the chart instance
        let selectedYear = null; // Track the currently selected year

        $(document).ready(function () {
            // Fetch available years from the server
            $.get('ajax_fetch_data.php', { action: 'get_years' }, function (data) {
                const years = JSON.parse(data);
                const yearDropdown = $('#year');
                years.forEach(year => {
                    yearDropdown.append(new Option(year, year));
                });

                // Load graph for the first year by default
                if (years.length > 0) {
                    selectedYear = years[0];
                    loadGraph(selectedYear);
                }
            });

            // Change event for the dropdown
            $('#year').change(function () {
                selectedYear = $(this).val();
                loadGraph(selectedYear);
            });

            // Function to load and update the graph
            function loadGraph(year) {
                // Fetch data for the selected year
                $.get('ajax_fetch_data.php', { year: year, action: 'get_data' }, function (data) {
                    const chartData = JSON.parse(data);

                    // Clear existing chart
                    if (currentChart) {
                        currentChart.destroy();
                    }

                    // Create new chart
                    const ctx = document.getElementById('lineChart').getContext('2d');
                    currentChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: chartData.labels,
                            datasets: [{
                                label: `Dengue Cases in ${year}`,
                                data: chartData.data,
                                borderColor: 'teal',
                                borderWidth: 2,
                                fill: false,
                                pointRadius: 3
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: { display: true }
                            }
                        }
                    });
                });
            }

            // Automatically refresh the graph every 10 seconds
            setInterval(function () {
                if (selectedYear) {
                    loadGraph(selectedYear); // Reload the graph for the selected year
                }
            }, 10000); // Update every 10 seconds (adjust as needed)
        });
    </script>
</body>
</html>
