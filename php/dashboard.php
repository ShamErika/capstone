<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dengue Cases</title>
    <style>
        body {
            font-family: "century gothic";
        }
        h1 {
            color: #0e4c92;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            color: #1167b1;
        }
        select {
            font-family: "century gothic";
        }
        .filter-container {
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <script>
        function filterData() {
            const year = document.getElementById("yearFilter").value;
            const barangay = document.getElementById("barangayFilter").value;
            const month = document.getElementById("monthFilter").value;
            const rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                const rowYear = row.getAttribute("data-year");
                const rowBarangay = row.getAttribute("data-barangay");
                const rowMonth = row.getAttribute("data-month");

                row.style.display = (
                    (year === "all" || rowYear === year) &&
                    (barangay === "all" || rowBarangay === barangay) &&
                    (month === "all" || rowMonth === month)
                ) ? "" : "none";
            });
        }
    </script>
</head>
<body>
    <h1>DENGUE CASES</h1>

    <!-- Filters -->
    <div class="filter-container">
        <label for="yearFilter">Filter by Year:</label>
        <select id="yearFilter" onchange="filterData()">
            <option value="all">All</option>
            <?php
            $yearsQuery = "SELECT DISTINCT year FROM dengue_cases_2022_2024 ORDER BY year";
            $yearsResult = $conn->query($yearsQuery);
            while ($row = $yearsResult->fetch_assoc()) {
                echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
            }
            ?>
        </select>

        <label for="barangayFilter">Filter by Barangay:</label>
        <select id="barangayFilter" onchange="filterData()">
            <option value="all">All</option>
            <?php
            $barangayQuery = "SELECT DISTINCT barangay FROM dengue_cases_2022_2024 ORDER BY barangay";
            $barangayResult = $conn->query($barangayQuery);
            while ($row = $barangayResult->fetch_assoc()) {
                echo "<option value='" . $row['barangay'] . "'>" . $row['barangay'] . "</option>";
            }
            ?>
        </select>

        <label for="monthFilter">Filter by Month:</label>
        <select id="monthFilter" onchange="filterData()">
            <option value="all">All</option>
            <?php
            $months = [
                'January', 'February', 'March', 'April', 'May', 'June', 
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            foreach ($months as $month) {
                echo "<option value='$month'>$month</option>";
            }
            ?>
        </select>
    </div>

    <!-- Table for Dengue Cases -->
    <table>
        <thead>
            <tr>
                <th>Barangay</th>
                <th>Month</th>
                <th>Cases</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $casesQuery = "SELECT * FROM dengue_cases_2022_2024 
                ORDER BY year, 
                FIELD(month, 'January', 'February', 'March', 'April', 'May', 
                            'June', 'July', 'August', 'September', 'October', 'November', 'December')";
            $casesResult = $conn->query($casesQuery);

            if ($casesResult->num_rows > 0) {
                while ($row = $casesResult->fetch_assoc()) {
                    echo "<tr data-year='" . $row['year'] . "' data-barangay='" . $row['barangay'] . "' data-month='" . $row['month'] . "'>";
                    echo "<td>" . $row['barangay'] . "</td>";
                    echo "<td>" . $row['month'] . "</td>";
                    echo "<td>" . $row['cases'] . "</td>";
                    echo "<td>" . $row['year'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>