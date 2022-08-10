<?php
include('../include/dbconn.php');
$id = $_GET['id'];
if (isset($_POST['send'])) {
    $price = $_POST['price'];
    $sql = "UPDATE customize SET totalPrice = :totalprice WHERE id =" . $id;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':totalprice', $price);
    if ($stmt->execute()) {
        header('Location: viewCust.php?success');
    } else {
        echo "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MustangDu</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body id="body">
    <div class="container">
        <div class="home">
            <a href="../index.php" class="homeBtn">Go to Home</a>
        </div>
        <main>
            <h1>Add Category</h1>
            <div class="home">
                <a href="viewCust.php" class="homeBtn">View Customized</a>
            </div>
            <form action="addTotalprice.php?id=<?php echo $id ?>" method="post">
                <input type="text" name="price" placeholder="Total Price" required><br>
                <input type="submit" name="send" value="Confirm">
            </form>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>