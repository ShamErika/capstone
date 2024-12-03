<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .search-container { margin: 50px auto; text-align: center; }
        input[type="text"] {
            width: 300px; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 15px; 
            background-color: #007BFF; 
            color: #fff; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
        }
        input[type="submit"]:hover { background-color: #0056b3; }
        .results { margin-top: 20px; }
        .result-item { margin: 10px 0; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="search-container">
        <h1>Search for Mosquito Information</h1>
        <form method="GET" action="search.php">
            <input type="text" name="query" placeholder="Enter search term..." required>
            <input type="submit" value="Search">
        </form>

        <div class="results">
            <?php
            if (isset($_GET['query'])) {
                $query = $conn->real_escape_string($_GET['query']);
                $sql = "SELECT * FROM mosquito_info WHERE title LIKE '%$query%' OR description LIKE '%$query%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<h2>Results for: '$query'</h2>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='result-item'>";
                        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No results found for '$query'.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
