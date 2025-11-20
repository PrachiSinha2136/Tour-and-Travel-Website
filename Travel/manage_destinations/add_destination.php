<?php require '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO destinations (name, image, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $image, $description);
    $stmt->execute();

    header("Location: destinations.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Destination</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h2>Add New Destination</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Destination Name</label>
                <input name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image Filename (from /images/)</label>
                <input name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>
            <button class="btn btn-success">Save Destination</button>
            <a href="destinations.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>