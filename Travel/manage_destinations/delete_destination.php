<?php
require '../backend/db.php';
$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("DELETE FROM destinations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: destinations.php");
exit();
