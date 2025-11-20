<?php
require '../backend/db.php';

$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM packages WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$package = $stmt->get_result()->fetch_assoc();

// Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $destination_id = $_POST['destination_id'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $update = $conn->prepare("UPDATE packages SET destination_id=?, title=?, image=?, description=?, price=? WHERE id=?");
    $update->bind_param("isssdi", $destination_id, $title, $image, $description, $price, $id);
    $update->execute();
    header("Location: packages.php");
    exit();
}

$destinations = $conn->query("SELECT * FROM destinations");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h2>Edit Package</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input name="title" class="form-control" value="<?= htmlspecialchars($package['title']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Destination</label>
                <select name="destination_id" class="form-select">
                    <?php while ($dest = $destinations->fetch_assoc()): ?>
                        <option value="<?= $dest['id'] ?>" <?= $dest['id'] == $package['destination_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($dest['name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input name="image" class="form-control" value="<?= htmlspecialchars($package['image']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required><?= htmlspecialchars($package['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input name="price" type="number" class="form-control" value="<?= $package['price'] ?>" required>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="packages.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>