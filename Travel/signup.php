<?php include 'partials/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup – TravelXplore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .flex-grow-1 {
            flex: 1;
        }
    </style>
</head>

<body>

    <div class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="container" style="max-width: 500px;">
            <h3 class="text-center mb-4">Create Your Account</h3>
            <form action="backend/handle_signup.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Create Password</label>
                    <input type="password" class="form-control" id="password" name="password" required />
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
</body>

</html>