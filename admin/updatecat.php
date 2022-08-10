<?php include('../include/dbconn.php');
session_start();
require_once('include/auth.php');
$msg = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MustangDut</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body id="body">
    <div class="container">
        <div class="home">
            <a href="../index.php" class="homeBtn">Go to Home</a>
        </div>
        <main>
            <h1>Category</h1>
            <h1>Update Category</h1>
            <div class="home">
                <a href="addcat.php" class="homeBtn">Add Category</a>
                <a href="deletecategory.php" class="homeBtn">Delete Category</a>
                <a href="viewcat.php" class="homeBtn">View Category</a>
            </div>

            <form action="updatecat.php" method="post" enctype="multipart/form-data">
                <select name="t1" required>
                    <option value="">SELECT CATEGORY</option>
                    <?php
                    $s = "SELECT * FROM category";
                    $stmt = $conn->prepare($s);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        if (isset($_POST['show']) && $row['cat_id'] == $_POST['t1']) {
                            echo "<option value =" . $row['Cat_id'] . " selected>" . $row['Cat_name'] . "</option>";
                        } else {
                            echo "<option value =" . $row['Cat_id'] . " >" . $row['Cat_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Show" name="show" formnovalidate />
                <?php
                if (isset($_POST['show'])) {
                    $s = "SELECT * FROM category WHERE Cat_id ='" . $_POST['t1'] . "'";
                    $stmt = $conn->prepare($s);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $Cat_id = $result['Cat_id'];
                    $Cat_name = $result['Cat_name'];
                    $img = $result['img'];
                }
                ?>
                <h2>Old Pic</h2><br>
                <img src="upload/category/<?php echo @$img; ?>" width="150px" height="100px" />
                <input type="hidden" name="h1" value="<?php if (isset($_POST["show"])) {
                                                            echo $img;
                                                        } ?>" /><br>
                <h2>Upload Pic</h2>
                <input type="file" name="t3" /><br>
                <input type="text" name="t2" value="<?php
                                                    if (isset($_POST['show'])) {
                                                        echo $Cat_name;
                                                    }
                                                    ?>" placeholder="Category Name">
                <input type="submit" name="save" value="Update">
            </form>
            <?php
            if (isset($_POST['save'])) {

                $images = $_FILES['t3']['name'];
                $tmp_dir = $_FILES['t3']['tmp_name'];
                $imageSize = $_FILES['t3']['size'];

                $upload_dir = 'upload/category/';
                $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
                $picProfile = rand(1000, 1000000) . "." . $imgExt;
                move_uploaded_file($tmp_dir, $upload_dir . $picProfile);
                if (empty($_FILES['t3']['name'])) {

                    $s = "update category set cat_name='" . $_POST["t2"] . "',img ='" . $_POST["h1"] . "' where Cat_id='" . $_POST["t1"] . "'";
                } else {

                    $s = "update category set cat_name='" . $_POST["t2"] . "',img ='" . $picProfile . "' where Cat_id='" . $_POST["t1"] . "'";
                }
                $stmt = $conn->prepare($s);
                $stmt->execute();
                echo "<script>alert('Record Updated');</script>";
                header("Location: updatecat.php?Record_Updated");
            }
            ?>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>