<?php
  session_start(); 

  $isLoggedIn = isset($_SESSION['user_id']); 
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
        <a href="update_data.php" target="content-frame">UPDATE</a>
        <a href="dashboard.php" target="content-frame">DATA TABLE</a>
        <a href="../php/logout.php" class="logout-btn">Logout</a>

        
    </div>
    
    <div class="content">
        <iframe name="content-frame" src="update_data.php"></iframe>
    </div>

       
    </div>


</body>
</html>
