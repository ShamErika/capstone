<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>

.login-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(50deg, #0B60B0, white);
  background-size: 400% 400%;
  animation: gradientMove 10s ease infinite;
    
    text-align: center;
    font-family: "Century Gothic";
}
.login-container h1 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #0e4c92;
}

form {
    background: white;
    padding: 20px 40px;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
form label {
    font-size: 14px;
    color: #29353c;
}
form input {
    width: 100%;
    padding: 8px;
    margin: 8px 0 16px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
form button {
    background-color: #0B60B0;
    color: white;
    padding: 8px;
    border: none;
    cursor: pointer;
    font-family: "Century Gothic";
    font-size: 12px;
}

form button:hover {
    background-color: #aac7d8;
}


</style>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    </head>
<body>
    <div class="login-container">
        <h1 style="color: white;">ADMIN LOGIN</h1>
        <form action="admin_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>

