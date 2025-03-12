<?php
$conn = new mysqli("localhost", "root", "", "guitar_store");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM guitars WHERE id=$id");
$guitar = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $guitar['name']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?php echo $guitar['name']; ?></h1>
    <img src="<?php echo $guitar['image']; ?>" alt="Guitar">
    <p><?php echo $guitar['description']; ?></p>
    <p>Price: $<?php echo $guitar['price']; ?></p>
    <button onclick="addToCart(<?php echo $guitar['id']; ?>)">Add to Cart</button>

    <script>
        function addToCart(id) {
            alert("Added to cart: " + id);
        }
    </script>
</body>
</html>
