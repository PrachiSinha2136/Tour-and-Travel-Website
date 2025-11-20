<?php
require 'backend/db.php';
include 'partials/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>TravelXplore – Explore the World</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            height: 90vh;
            background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s ease-in-out;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .testimonials {
            background: url('images/testimonial-bg.jpg') no-repeat center center/cover;
        }

        .call-to-action {
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero text-white text-center d-flex align-items-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Explore the World with TravelXplore</h1>
            <p class="lead">Unforgettable journeys, breathtaking destinations</p>
            <a href="view_packages.php" class="btn btn-primary btn-lg mt-3">Get Started</a>
        </div>
    </section>

    <!-- Top Destinations -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title">Top Destinations</h2>
            <div class="row g-4">
                <?php
                $destQuery = $conn->query("SELECT * FROM destinations ORDER BY id DESC LIMIT 6");
                while ($dest = $destQuery->fetch_assoc()):
                ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="<?= htmlspecialchars($dest['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($dest['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($dest['name']) ?></h5>
                                <p class="card-text text-muted small"><?= substr(strip_tags($dest['description']), 0, 80) ?>...</p>
                                <a href="packages_by_destination.php?id=<?= $dest['id'] ?>" class="btn btn-outline-primary btn-sm">View Packages</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Latest Packages -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">Latest Travel Packages</h2>
            <div class="row g-4">
                <?php
                $pkgQuery = $conn->query("SELECT packages.*, destinations.name AS destination_name FROM packages 
                                          JOIN destinations ON packages.destination_id = destinations.id 
                                          ORDER BY packages.id DESC LIMIT 6");
                while ($pkg = $pkgQuery->fetch_assoc()):
                ?>
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="<?= htmlspecialchars($pkg['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($pkg['title']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($pkg['title']) ?></h5>
                                <p class="card-text text-muted small"><?= substr(strip_tags($pkg['description']), 0, 80) ?>...</p>
                                <p class="fw-bold text-primary">₹<?= number_format($pkg['price']) ?> <span class="text-muted small"> - <?= htmlspecialchars($pkg['destination_name']) ?></span></p>
                                <a href="package.php?id=<?= $pkg['id'] ?>" class="btn btn-outline-success btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials py-5 text-white text-center">
        <div class="container">
            <h2 class="section-title mb-4">What Our Travelers Say</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-opacity-75 bg-dark rounded">
                        <i class="bi bi-chat-right-quote-fill fs-2 text-warning"></i>
                        <p class="mt-3">“TravelXplore made my honeymoon stress-free and magical!”</p>
                        <h6>- Riya Sharma</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-opacity-75 bg-dark rounded">
                        <i class="bi bi-chat-right-quote-fill fs-2 text-warning"></i>
                        <p class="mt-3">“Great prices, great service. Already planning my next trip!”</p>
                        <h6>- Ankit Mehta</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-opacity-75 bg-dark rounded">
                        <i class="bi bi-chat-right-quote-fill fs-2 text-warning"></i>
                        <p class="mt-3">“Smooth bookings and amazing support throughout.”</p>
                        <h6>- Sneha Verma</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action -->
    <section class="call-to-action text-white text-center py-5">
        <div class="container">
            <h3 class="mb-3">Ready to start your adventure?</h3>
            <a href="signup.php" class="btn btn-light btn-lg px-4">Join Now</a>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>