<?php
// Path to Python executable and script
$pythonPath = "C:\\Path\\To\\Python\\python.exe";  // Update this path
$scriptPath = __DIR__ . "\\generate_predictions.py";  // Full path to the Python script

// Execute the Python script
$output = shell_exec("$pythonPath $scriptPath 2>&1");

echo "<pre>$output</pre>";  // Display output for debugging
?>
