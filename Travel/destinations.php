<?php include 'partials/navbar.php'; ?>
<?php require 'backend/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Top Destinations – TravelXplore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <!-- Page Header -->
    <section class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Explore Top Travel Destinations</h1>
            <p class="lead">Handpicked places around the world you can't miss!</p>
        </div>
    </section>

    <!-- Destinations Grid -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                $sql = "SELECT * FROM destinations";
                $result = $conn->query($sql);

                if ($result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                ?>
                        <div class="col-md-4">
                            <div class="card shadow-sm h-100">
                                <img src="<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                                    <a href="packages_by_destination.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary">View Packages</a>

                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                else:
                    echo "<p class='text-center'>No destinations found.</p>";
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>
</body>

</html>