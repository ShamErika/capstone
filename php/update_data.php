<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php"); // Redirect to login if not logged in
    exit;
}

include 'db_config.php'; // database connection

// barangays from the database
$barangays = [];
$sql = "SELECT DISTINCT barangay FROM dengue_cases_2022_2024";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $barangays[] = $row['barangay'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barangay = $_POST['barangay'];
    $month = $_POST['month'];
    $cases = $_POST['cases'];
    $year = $_POST['year'];

    // add new record 
    $sql = "INSERT INTO dengue_cases_2022_2024 (barangay, month, cases, year) VALUES ('$barangay', '$month', $cases, '$year')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Dengue Data</title>
    <style>
        body {
            background-color: #e5f0fa;
            font-family: "century gothic";
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h2 {
            color: #1167b1;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        form {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        input[type="text"], input[type="number"], select {
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-family: "century gothic";
        }
        input[type="submit"] {
            background-color: #1167b1;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-family: "century gothic";
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            font-family: "century gothic";
        }
    </style>
</head>
<body>
    <h2>Update Dengue Cases</h2>
    <div class="form-container">
        <form method="post" action="">
            <!-- Barangay Dropdown -->
            <select name="barangay" required>
                <option value="" disabled selected>Select Barangay</option>
                <?php
                // dropdown options from the database
                foreach ($barangays as $barangay) {
                    echo "<option value=\"$barangay\">$barangay</option>";
                }
                ?>
            </select>
            
            <input type="text" name="month" placeholder="Month" required>
            <input type="number" name="cases" placeholder="Cases" required>
            <input type="number" name="year" placeholder="Year" min="2021" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>