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

if (isset($_POST['insert'])) {

    $images1 = $_FILES['image1']['name'];
    $tmp_dir1 = $_FILES['image1']['tmp_name'];
    $imageSize1 = $_FILES['image1']['size'];

    $upload_dir1 = '../assets/things/';
    $imgExt1 = strtolower(pathinfo($images1, PATHINFO_EXTENSION));
    $valid_extensions1 = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picimage1 = rand(1000, 1000000) . "." . $imgExt1;
    move_uploaded_file($tmp_dir1, $upload_dir1 . $picimage1);

    $images2 = $_FILES['image2']['name'];
    $tmp_dir2 = $_FILES['image2']['tmp_name'];
    $imageSize2 = $_FILES['image2']['size'];

    $upload_dir2 = '../assets/things/';
    $imgExt2 = strtolower(pathinfo($images2, PATHINFO_EXTENSION));
    $valid_extensions2 = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picimage2 = rand(1000, 1000000) . "." . $imgExt2;
    move_uploaded_file($tmp_dir2, $upload_dir2 . $picimage2);

    $images3 = $_FILES['image3']['name'];
    $tmp_dir3 = $_FILES['image3']['tmp_name'];
    $imageSize3 = $_FILES['image3']['size'];

    $upload_dir3 = '../assets/things/';
    $imgExt3 = strtolower(pathinfo($images3, PATHINFO_EXTENSION));
    $valid_extensions3 = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picimage3 = rand(1000, 1000000) . "." . $imgExt3;
    move_uploaded_file($tmp_dir3, $upload_dir3 . $picimage3);

    $images4 = $_FILES['image4']['name'];
    $tmp_dir4 = $_FILES['image4']['tmp_name'];
    $imageSize4 = $_FILES['image4']['size'];

    $upload_dir4 = '../assets/things/';
    $imgExt4 = strtolower(pathinfo($images4, PATHINFO_EXTENSION));
    $valid_extensions4 = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picimage4 = rand(1000, 1000000) . "." . $imgExt4;
    move_uploaded_file($tmp_dir4, $upload_dir4 . $picimage4);

    $images5 = $_FILES['image5']['name'];
    $tmp_dir5 = $_FILES['image5']['tmp_name'];
    $imageSize5 = $_FILES['image5']['size'];

    $upload_dir5 = '../assets/things/';
    $imgExt5 = strtolower(pathinfo($images5, PATHINFO_EXTENSION));
    $valid_extensions5 = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picimage5 = rand(1000, 1000000) . "." . $imgExt5;
    move_uploaded_file($tmp_dir5, $upload_dir5 . $picimage5);

    $images6 = $_FILES['image6']['name'];
    $tmp_dir6 = $_FILES['image6']['tmp_name'];
    $imageSize6 = $_FILES['image6']['size'];

    $upload_dir6 = '../assets/things/';
    $imgExt6 = strtolower(pathinfo($images6, PATHINFO_EXTENSION));
    $valid_extensions6 = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picimage6 = rand(1000, 1000000) . "." . $imgExt6;
    move_uploaded_file($tmp_dir6, $upload_dir6 . $picimage6);

    $images7 = $_FILES['image7']['name'];
    $tmp_dir7 = $_FILES['image7']['tmp_name'];
    $imageSize7 = $_FILES['image7']['size'];

    $upload_dir7 = '../assets/things/';
    $imgExt7 = strtolower(pathinfo($images7, PATHINFO_EXTENSION));
    $valid_extensions7 = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picimage7 = rand(1000, 1000000) . "." . $imgExt7;
    move_uploaded_file($tmp_dir7, $upload_dir7 . $picimage7);

    $stmt = $conn->prepare('INSERT INTO gallery(pic,pic2,pic3,pic4,pic5,pic6,pic7) VALUES (:pic1,:pic2,:pic3,:pic4,:pic5,:pic6,:pic7)');
    $stmt->bindParam(':pic1', $picimage1);
    $stmt->bindParam(':pic2', $picimage2);
    $stmt->bindParam(':pic3', $picimage3);
    $stmt->bindParam(':pic4', $picimage4);
    $stmt->bindParam(':pic5', $picimage5);
    $stmt->bindParam(':pic6', $picimage6);
    $stmt->bindParam(':pic7', $picimage7);
    if ($stmt->execute()) {
        echo "<script>alert('new record successfull');</script>";
    } else {
        echo "<script>alert('Error.');</script>";
    }
}
?>

<body id="body">
    <div class="container">
        <div class="home">
            <a href="../index.php" class="homeBtn">Go to Home</a>
        </div>
        <main>
            <h1>Gallery</h1>
            <h1>Add Images</h1>
            <form action="addimg.php" method="post" enctype="multipart/form-data">
                <div class="form_group">
                    <label for="img">Image 1</label>
                    <input type="file" name="image1">
                </div>
                <div class="form_group">
                    <label for="img">Image 2</label>
                    <input type="file" name="image2">
                </div>
                <div class="form_group">
                    <label for="img">Image 3</label>
                    <input type="file" name="image3">
                </div>
                <div class="form_group">
                    <label for="img">Image 4</label>
                    <input type="file" name="image4">
                </div>
                <div class="form_group">
                    <label for="img">Image 5</label>
                    <input type="file" name="image5">
                </div>
                <div class="form_group">
                    <label for="img">Image 6</label>
                    <input type="file" name="image6">
                </div>
                <div class="form_group">
                    <label for="img">Image 7</label>
                    <input type="file" name="image7">
                </div>
                <input type="submit" name="insert" Upload Images>
            </form>


        </main>
        <?php include 'include/sidebar.php' ?>
    </div>
</body>

</html>