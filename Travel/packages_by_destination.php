<?php include 'partials/navbar.php'; ?>
<?php require 'backend/db.php';

$destination_id = $_GET['id'] ?? 0;

// Get destination info
$dest_stmt = $conn->prepare("SELECT name FROM destinations WHERE id = ?");
$dest_stmt->bind_param("i", $destination_id);
$dest_stmt->execute();
$dest_result = $dest_stmt->get_result();
$destination = $dest_result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($destination['name'] ?? 'Destination Packages') ?> – TravelXplore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <!-- Page Header -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold"><?= htmlspecialchars($destination['name'] ?? 'Travel Packages') ?></h1>
            <p class="lead">Carefully crafted experiences just for this destination</p>
        </div>
    </section>

    <!-- Package Cards -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                $stmt = $conn->prepare("SELECT * FROM packages WHERE destination_id = ?");
                $stmt->bind_param("i", $destination_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                ?>
                        <div class="col-md-4">
                            <div class="card shadow-sm h-100">
                                <img src="<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['title']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="package.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">
                                            <?= htmlspecialchars($row['title']) ?>
                                        </a>
                                    </h5>
                                    <p class="card-text"><?= htmlspecialchars(substr($row['description'], 0, 40)) . "..."  ?></p>
                                    <p class="fw-bold text-primary">₹<?= number_format($row['price']) ?> / person</p>
                                    <a href="package.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary w-100">View Details</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                else:
                    echo "<p class='text-center'>No packages available for this destination yet.</p>";
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>
</body>

</html>