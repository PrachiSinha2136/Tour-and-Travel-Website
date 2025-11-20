<?php
require 'backend/db.php';

// PRICE FETCH SAME PAGE
if (isset($_POST['get_price'])) {
    $id = intval($_POST['id']);
    $q = $conn->query("SELECT price FROM packages WHERE id = $id");

    if ($q && $q->num_rows > 0) {
        $row = $q->fetch_assoc();
        echo $row['price'];
    } else {
        echo "0";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
            height: 60vh;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .hero-overlay {
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .hero h1 {
            position: relative;
            color: #fff;
            font-size: 50px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<section class="hero">
    <div class="hero-overlay"></div>
    <h1 class="text-white">Book Your Tour</h1>
</section>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow p-4">
                <h3 class="mb-3">Traveler Details</h3>

                <!-- Form action points to last.php -->
                <form action="last.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <!-- Fixed name field issue -->
                            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                    </div>

                    <!-- PACKAGE + PRICE -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Package</label>
                            <select class="form-control" name="package_id" id="packageSelect" required>
                                <option value="">Select Package</option>

                                <?php
                                $qry = $conn->query("SELECT id, title FROM packages");
                                while ($row = $qry->fetch_assoc()) {
                                    echo "<option value='".$row['id']."'>".$row['title']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="₹0" readonly>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Book Now</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script>
document.getElementById("packageSelect").addEventListener("change", function () {
    let id = this.value;
    let priceInput = document.getElementById("price");

    if (id === "") {
        priceInput.value = "";
        return;
    }

    let formData = new FormData();
    formData.append("get_price", "1");
    formData.append("id", id);

    fetch("", { 
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(price => {
        if (price.trim() === "0") {
            priceInput.value = "—";
        } else {
            priceInput.value = "₹" + price;
        }
    })
    .catch(err => {
        console.error(err);
        priceInput.value = "—";
    });
});
</script>

</body>
</html>
