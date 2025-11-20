<?php
require '../backend/db.php';

$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: packages.php");
exit();
