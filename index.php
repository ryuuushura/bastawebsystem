<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guitar Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="dashboard">
        <h2>Guitar Store</h2>
        <nav>
            <a href="index.php">Home</a>
            <a href="manage_products.php">Manage Products</a>
            <a href="orders.php">Orders</a>
            <a href="logout.php">Logout</a>
        </nav>
    </div>

    <h1>Welcome to the Guitar Store</h1>
    <div class="guitar-list">
        <?php
        $result = $conn->query("SELECT * FROM guitars");
        while ($row = $result->fetch_assoc()):
        ?>
            <div class="guitar">
                <img src="<?php echo $row['image']; ?>" alt="Guitar">
                <h3><?php echo $row['name']; ?></h3>
                <p>$<?php echo $row['price']; ?></p>
                <a href="product.php?id=<?php echo $row['id']; ?>" class="button">View Details</a>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
