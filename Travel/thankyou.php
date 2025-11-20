<?php
$name = $_GET['name'] ?? "User";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
    <style>
        body { 
            font-family: Arial; 
            text-align: center; 
            padding: 50px; 
            background: #f4f4f4; 
        }
        .box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0 0 10px #ccc;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>🎉 Thank You, <?php echo $name; ?>!</h2>
        <p>Your booking has been received.</p>
        <p> We will contact you soon.</p>
        <a href="index.php">Go Back Home</a>
    </div>
</body>
</html>
