<?php
session_start();
$base = '/Travel';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?= $base ?>/index.php">
            <i class="bi bi-globe2 me-1"></i>TravelXplore
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? ' active' : '' ?>" href="<?= $base ?>/index.php">
                        <i class="bi bi-house-door-fill me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'destinations.php' ? ' active' : '' ?>" href="<?= $base ?>/destinations.php">
                        <i class="bi bi-geo-alt-fill me-1"></i>Destinations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'view_packages.php' ? ' active' : '' ?>" href="<?= $base ?>/view_packages.php">
                        <i class="bi bi-box-seam me-1"></i>View Packages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? ' active' : '' ?>" href="<?= $base ?>/about.php">
                        <i class="bi bi-info-circle-fill me-1"></i>About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? ' active' : '' ?>" href="<?= $base ?>/contact.php">
                        <i class="bi bi-envelope-fill me-1"></i>Contact
                    </a>
                </li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? ' active' : '' ?>" href="<?= $base ?>/dashboard.php">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard
                        </a>
                    </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">
                            <i class="bi bi-person-check me-1"></i>Hi, <?= htmlspecialchars($_SESSION['user_name']); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm ms-2" href="<?= $base ?>/logout.php">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light btn-sm me-2" href="<?= $base ?>/login.php">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm" href="<?= $base ?>/signup.php">
                            <i class="bi bi-person-plus-fill me-1"></i>Sign Up
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>