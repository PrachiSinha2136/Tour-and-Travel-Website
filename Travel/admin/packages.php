<?php
require '../backend/db.php';
include '../partials/navbar.php';

// Handle search
$search = '';
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT packages.*, destinations.name AS destination_name FROM packages 
            JOIN destinations ON packages.destination_id = destinations.id 
            WHERE packages.title LIKE '%$search%' OR destinations.name LIKE '%$search%'
            ORDER BY packages.id DESC";
} else {
    $sql = "SELECT packages.*, destinations.name AS destination_name FROM packages 
            JOIN destinations ON packages.destination_id = destinations.id 
            ORDER BY packages.id DESC";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Packages – Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .table-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
        }

        .title-text {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 text-center">📦 Manage Packages</h2>

        <div class="row mb-3">
            <div class="col-md-8">
                <form method="get" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="🔍 Search by title or destination..." value="<?= htmlspecialchars($search) ?>">
                    <button class="btn btn-outline-primary">Search</button>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="add_package.php" class="btn btn-success">➕ Add New Package</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover bg-white align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Destination</th>
                        <th>Price (₹)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="text-center">
                                <td><span class="badge bg-secondary"><?= $row['id'] ?></span></td>
                                <td>
                                    <?php if (!empty($row['image'])): ?>
                                        <img src="<?= htmlspecialchars($row['image']) ?>" class="table-img" alt="<?= htmlspecialchars($row['title']) ?>">
                                    <?php else: ?>
                                        <span class="text-muted">No image</span>
                                    <?php endif; ?>
                                </td>
                                <td class="title-text fw-semibold"><?= htmlspecialchars($row['title']) ?></td>
                                <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['destination_name']) ?></span></td>
                                <td class="fw-bold text-success">₹<?= number_format($row['price']) ?></td>
                                <td>
                                    <a href="edit_package.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary me-1">✏️ Edit</a>
                                    <a href="delete_package.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this package?');">🗑️ Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">No packages found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>