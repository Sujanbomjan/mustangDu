<?php include '../include/dbconn.php';
session_start();
require_once 'include/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MustangDu</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<?php

if (isset($_POST['btn-add'])) {

    $images = $_FILES['profile']['name'];
    $tmp_dir = $_FILES['profile']['tmp_name'];
    $imageSize = $_FILES['profile']['size'];

    $upload_dir = 'upload/';
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picProfile = rand(1000, 1000000) . "." . $imgExt;
    move_uploaded_file($tmp_dir, $upload_dir . $picProfile);
    $subcatname = $_POST['t1'];
    $catname = $_POST['t2'];
    $detail = $_POST['t4'];
    $stmt = $conn->prepare('INSERT INTO subcategory(Subcatname,Catid,Pic,Detail) VALUES (:subcatname,:catname,:upic,:detail)');
    $stmt->bindParam(':subcatname', $subcatname);
    $stmt->bindParam(':catname', $catname);
    $stmt->bindParam(':upic', $picProfile);
    $stmt->bindParam(':detail', $detail);
    if ($stmt->execute()) {
        echo "<script>alert('new record successfull');window.location.href = ('addsubcat.php');</script>";
    } else {
        echo "<script>alert('Error.');window.location.href = ('addsubcat.php');</script>";
    }
}
?>

<body id="body">
    <div class="container">
        <div class="home">
            <a href="../index.php" class="homeBtn">Go to Home</a>
        </div>
        <main>
            <h1>Category</h1>
            <h1>Add Sub-Category</h1>
            <div class="home">
                <a href="viewsubcat.php" class="homeBtn">View Subcategory</a>
                <a href="deletesubcat.php" class="homeBtn">Delete Subcategory</a>
                <a href="updatesubcat.php" class="homeBtn">Update Subcategory</a>
            </div>
            <form action="addsubcat.php" method="post" enctype="multipart/form-data">
                <input type="text" name="t1" placeholder="Sub-Category Name" required><br>
                <select name="t2" required>
                    <option value="">Select Category</option>
                    <?php
                    $s = "SELECT * FROM category";
                    $stmt = $conn->prepare($s);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value =" . $row['Cat_id'] . ">" . $row['Cat_name'] . "</option>";
                    }
                    ?>
                </select><br>

                <textarea type="text" name="t4" placeholder="Detail" required></textarea><br>
                <label> Add Image : </label>
                <input type="file" name="profile" required><br>
                <input type="submit" name="btn-add" value="Add">
            </form>

        </main>
        <?php include 'include/sidebar.php' ?>
    </div>
</body>

</html>