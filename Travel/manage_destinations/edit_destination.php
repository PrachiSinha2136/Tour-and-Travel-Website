<?php
require '../backend/db.php';
$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM destinations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $update = $conn->prepare("UPDATE destinations SET name=?, image=?, description=? WHERE id=?");
    $update->bind_param("sssi", $name, $image, $description, $id);
    $update->execute();

    header("Location: destinations.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Destination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h2>Edit Destination</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Destination Name</label>
                <input name="name" class="form-control" value="<?= htmlspecialchars($data['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input name="image" class="form-control" value="<?= htmlspecialchars($data['image']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required><?= htmlspecialchars($data['description']) ?></textarea>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="destinations.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>