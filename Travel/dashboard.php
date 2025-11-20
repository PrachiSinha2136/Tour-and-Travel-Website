<?php include 'partials/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard | TravelXplore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 text-center">🛠️ Admin Dashboard – TravelXplore</h2>

        <div class="row justify-content-center g-4">
            <div class="col-md-5">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">🧳 Manage Packages</h4>
                        <p class="card-text">Add, edit, or remove travel packages offered by TravelXplore.</p>
                        <a href="admin/packages.php" class="btn btn-primary">Go to Package Panel</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card shadow border-0 h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">📍 Manage Destinations</h4>
                        <p class="card-text">Add, edit, or remove travel destinations from the platform.</p>
                        <a href="manage_destinations/destinations.php" class="btn btn-secondary">Go to Destination Panel</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include 'partials/footer.php'; ?>
</body>

</html>