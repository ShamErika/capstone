<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php"); // Redirect to login if not logged in
    exit;
}

include 'db.php'; // database connection

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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 200px;
            background-color: #0B60B0;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
             font-family: "Century Gothic", sans-serif;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .content {
            flex: 1;
            background-color: #ecf0f1;
            padding: 20px;
        }

        iframe {
            border: none;
            width: 100%;
            height: 100%;
        }


        /* Logout Button Styling */
.logout {
    position: absolute;
    bottom: 20px; /* Keep the button at the bottom */
    width: 100%;
    text-align: center;
}

.logout-btn {
    padding: 10px 20px;
    color: white;
   
    text-decoration: none;
    border-radius: 5px;
}

.logout-btn:hover {
    background-color: darkred; /* Hover effect */
}

/* Apply Century Gothic to h2 elements only */
h2 {
    font-family: "Century Gothic", sans-serif;
    text-align: center;
}
 

    </style>
</head>
<body>

    <div class="sidebar">
    <div class="logo">
    <img src="../img/lamok.png" alt="Logo" style="width: 100%; height: auto;">

    </div>
        <h2>ADMIN PANEL</h2>
        <a href="update.php" target="content-frame">UPDATE</a>
        <a href="dashboard.php" target="content-frame">DATA TABLE</a>

        
        <a href="../php/logout.php" class="logout-btn">Logout</a>

        
    </div>
    
    <div class="content">
        <iframe name="content-frame" src="update.php"></iframe>
    </div>

       
    </div>

</body>
</html>
