<?php
require '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $destination_id = $_POST['destination_id'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO packages (destination_id, title, image, description, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isssd", $destination_id, $title, $image, $description, $price);
    $stmt->execute();
    header("Location: packages.php");
    exit();
}

// Get destinations
$destinations = $conn->query("SELECT * FROM destinations");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h2>Add New Package</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Destination</label>
                <select name="destination_id" class="form-select" required>
                    <?php while ($dest = $destinations->fetch_assoc()): ?>
                        <option value="<?= $dest['id'] ?>"><?= htmlspecialchars($dest['name']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Image Filename (from /images/)</label>
                <input name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price (₹)</label>
                <input name="price" type="number" class="form-control" required>
            </div>
            <button class="btn btn-success">Save Package</button>
            <a href="packages.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>