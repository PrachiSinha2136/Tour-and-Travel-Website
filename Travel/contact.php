<?php include 'partials/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Contact Us – TravelXplore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <!-- Page Header -->
    <section class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Contact Us</h1>
            <p class="lead">We’d love to hear from you</p>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="py-5 bg-light">
        <div class="container" style="max-width: 700px;">
            <h3 class="mb-4">Send Us a Message</h3>
            <form action="save_contact.php" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Message</button>
</form>

        </div>
    </section>

    <!-- Founders Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Meet Our Founders</h2>
            <div class="row g-4 justify-content-center">


                <!-- Founder 1 -->
                <div class="col-md-4 col-lg-2">
                    <div class="card border-0 shadow-sm">
                        <img src="image/a1.jpeg" class="card-img-top" alt="Founder 1">
                        <div class="card-body">
                            <h6 class="card-title">Prachi Sinha</h6>
                            <p class="text-muted small">Backend Developer</p>
                        </div>
                    </div>
                </div>

                <!-- Founder 2 -->
                <div class="col-md-4 col-lg-2">
                    <div class="card border-0 shadow-sm">
                        <img src="image/a2.jpg" class="card-img-top" alt="Founder 2">
                        <div class="card-body">
                            <h6 class="card-title">AYUSH KUMAR</h6>
                            <p class="text-muted small">UI/UX Designer</p>
                        </div>
                    </div>
                </div>

                <!-- Founder 3 -->
                <div class="col-md-4 col-lg-2">
                    <div class="card border-0 shadow-sm">
                        <img src="image/a3.jpeg" class="card-img-top" alt="Founder 3">
                        <div class="card-body">
                            <h6 class="card-title">Sushmita kumari</h6>
                            <p class="text-muted small">Frontend Developer</p>
                        </div>
                    </div>
                </div>

        
            </div>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>
</body>

</html>