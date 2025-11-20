<?php require '../backend/db.php';
include '../partials/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Destinations – Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <style>
        .table-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
        }

        .desc-text {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 text-center">📍 Manage Destinations</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="add_destination.php" class="btn btn-success">➕ Add New Destination</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped bg-white align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM destinations ORDER BY id DESC");
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr class="text-center">
                            <td><span class="badge bg-secondary"><?= $row['id'] ?></span></td>
                            <td class="fw-semibold"><?= htmlspecialchars($row['name']) ?></td>
                            <td>
                                <?php if (!empty($row['image'])): ?>
                                    <img src="<?= htmlspecialchars($row['image']) ?>" class="table-img" alt="<?= htmlspecialchars($row['name']) ?>">
                                <?php else: ?>
                                    <span class="text-muted">No image</span>
                                <?php endif; ?>
                            </td>
                            <td class="desc-text"><?= htmlspecialchars($row['description']) ?></td>
                            <td>
                                <a href="edit_destination.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary me-1">✏️ Edit</a>
                                <a href="delete_destination.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this destination?');">🗑️ Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>