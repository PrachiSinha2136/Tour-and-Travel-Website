<?php include 'partials/navbar.php'; ?>
<?php require 'backend/db.php';

$package_id = $_GET['id'] ?? 0;

// Fetch package details
$stmt = $conn->prepare("SELECT p.*, d.name AS destination_name FROM packages p LEFT JOIN destinations d ON p.destination_id = d.id WHERE p.id = ?");
$stmt->bind_param("i", $package_id);
$stmt->execute();
$result = $stmt->get_result();
$package = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title><?= htmlspecialchars($package['title'] ?? 'Package') ?> – TravelXplore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .header-banner {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)),
                url('<?= htmlspecialchars($package['image'] ?? 'default.jpg') ?>') center center/cover no-repeat;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .header-banner h1 {
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.8);
        }

        .package-section {
            padding: 60px 0;
        }

        .package-section .card {
            border: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .package-section .card:hover {
            transform: translateY(-5px);
        }

        .btn-custom {
            padding: 10px 30px;
            font-size: 1.1rem;
            border-radius: 50px;
        }

        .package-description {
            font-size: 1.05rem;
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            .header-banner h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

    <?php if ($package): ?>
        <!-- Hero Banner -->
        <section class="header-banner">
            <div class="container">
                <h1><?= htmlspecialchars($package['title']) ?></h1>
                <p class="lead">Explore the wonders of <strong><?= htmlspecialchars($package['destination_name']) ?></strong></p>
            </div>
        </section>

        <!-- Package Details -->
        <section class="package-section">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <img src="<?= htmlspecialchars($package['image']) ?>" class="img-fluid rounded shadow-sm" alt="<?= htmlspecialchars($package['title']) ?>">
                    </div>
                    <div class="col-lg-6">
                        <h4 class="mb-3">About This Package</h4>
                        <p class="package-description"><?= nl2br(htmlspecialchars($package['description'])) ?></p>

                        <h5 class="text-success fw-bold mt-4 mb-3">Price: ₹<?= number_format($package['price']) ?> / person</h5>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="bookings.php" class="btn btn-primary btn-custom"><i class="bi bi-cart-fill me-2"></i>Book Now</a>
                            <a href="packages_by_destination.php?id=<?= $package['destination_id'] ?>" class="btn btn-outline-secondary btn-custom">
                                <i class="bi bi-arrow-left-circle me-2"></i>Back to Destination
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <div class="container py-5">
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> Package not found.
            </div>
        </div>
    <?php endif; ?>

    <?php include 'partials/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>