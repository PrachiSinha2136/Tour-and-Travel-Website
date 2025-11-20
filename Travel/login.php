<!-- Inside <ul class="navbar-nav ms-auto"> -->
<?php if (isset($_SESSION['user_id'])): ?>
    <li class="nav-item"><a class="nav-link">Hi, <?= $_SESSION['user_name'] ?></a></li>
    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
<?php else: ?>
<?php endif; ?>

<?php include 'partials/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login – TravelXplore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5" style="max-width: 500px;">
        <h3 class="text-center mb-4">Login to Your Account</h3>
        <form action="backend/handle_login.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">Don't have an account? <a href="signup.php">Sign up now</a></p>
        </form>
    </div>

    <?php include 'partials/footer.php'; ?>
</body>

</html>