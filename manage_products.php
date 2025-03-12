<?php
include 'db_connect.php';

// Handle adding a new guitar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $sql = "INSERT INTO guitars (name, price, image, description) VALUES ('$name', '$price', '$image', '$description')";
    $conn->query($sql);
    header("Location: manage_products.php");
}

// Handle deleting a guitar
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM guitars WHERE id=$id");
    header("Location: manage_products.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="dashboard">
        <h2>Manage Products</h2>
        <nav>
            <a href="index.php">Home</a>
            <a href="orders.php">Orders</a>
            <a href="logout.php">Logout</a>
        </nav>
    </div>

    <h2>Add New Guitar</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Guitar Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="text" name="image" placeholder="Image URL" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Add Guitar</button>
    </form>

    <h2>Existing Guitars</h2>
    <table>
        <tr><th>Name</th><th>Price</th><th>Action</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM guitars");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td><a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this guitar?')">Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
