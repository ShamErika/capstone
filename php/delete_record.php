<?php
include 'db.php';
$input = json_decode(file_get_contents('php://input'), true);
$id = $input['id'];

$deleteQuery = "DELETE FROM dengue_cases_2022_2024 WHERE id = ?";
$stmt = $conn->prepare($deleteQuery);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
$stmt->close();
$conn->close();
?>
