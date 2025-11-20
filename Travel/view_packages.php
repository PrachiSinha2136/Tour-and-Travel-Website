<?php include 'partials/navbar.php'; ?>
<?php require 'backend/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Available Packages – TravelXplore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <!-- Page Header -->
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Explore Our Travel Packages</h1>
            <p class="lead">Handpicked experiences just for you</p>
        </div>
    </section>

    <!-- Packages Display -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                $sql = "SELECT * FROM packages";
                $result = $conn->query($sql);

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

                                    <p class="card-text"><?= htmlspecialchars(substr($row['description'], 0, 48)) . "..." ?></p>
                                    <p class="fw-bold text-primary">₹<?= number_format($row['price']) ?> / person</p>
                                    <a href="package.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary w-100">View Details</a>

                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                else:
                    echo "<p class='text-center'>No packages found.</p>";
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>
</body>

</html>