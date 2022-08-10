<?php include('../include/dbconn.php');
session_start();
require_once('include/auth.php');
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
                <a href="viewcat.php" class="homeBtn">View Category</a>
                <a href="deletecategory.php" class="homeBtn">Delete Category</a>
                <a href="updatecat.php" class="homeBtn">Update Category</a>
            </div>
            <form action="addcat.php" method="post" enctype="multipart/form-data">
                <input type="text" name="catname" placeholder="Category Name"><br>
                Add Image: <input type="file" name="profile" required><br>
                <input type="submit" name="save" value="Save">
            </form>

            <?php
            if (isset($_POST['save'])) {
                $images = $_FILES['profile']['name'];
                $tmp_dir = $_FILES['profile']['tmp_name'];
                $imageSize = $_FILES['profile']['size'];

                $upload_dir = 'upload/category/';
                $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                $picProfile = rand(1000, 1000000) . "." . $imgExt;
                move_uploaded_file($tmp_dir, $upload_dir . $picProfile);
                $cat_name = $_POST['catname'];
                $sql = "INSERT INTO category(Cat_name,img) VALUES (:cat_name, :pic)";
                $result = $conn->prepare($sql);
                $result->bindParam(':cat_name', $cat_name);
                $result->bindParam(':pic', $picProfile);
                $result->execute();
                echo "<script>alert('Record Added');</script>";
            }
            ?>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>