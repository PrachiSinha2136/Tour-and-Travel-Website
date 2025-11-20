<?php
require 'backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $packageId = $_POST['package_id'];

    // Fetch package info from database
    $stmt = $conn->prepare("SELECT title, price FROM packages WHERE id = ?");
    $stmt->bind_param("i", $packageId);
    $stmt->execute();
    $result = $stmt->get_result();
    $package = $result->fetch_assoc();

    if (!$package) {
        die("Invalid package selected!");
    }

    $packageName = $package['title'];
    $price = $package['price'];

    // Save booking in database
    $save = $conn->prepare("INSERT INTO bookings (name, email, package_id, package_name, price) VALUES (?, ?, ?, ?, ?)");
    $save->bind_param("ssisi", $name, $email, $packageId, $packageName, $price);
    $save->execute();

    // Redirect to thank you page
    header("Location: thankyou.php?name=" . urlencode($name));
    exit();
}
?>
