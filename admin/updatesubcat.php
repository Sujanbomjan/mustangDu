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
if (isset($_POST['btn-update'])) {

    $images = $_FILES['t3']['name'];
    $tmp_dir = $_FILES['t3']['tmp_name'];
    $imageSize = $_FILES['t3']['size'];

    $upload_dir = 'upload/';
    $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
    $picProfile = rand(1000, 1000000) . "." . $imgExt;
    move_uploaded_file($tmp_dir, $upload_dir . $picProfile);
}
?>
<?php
if (isset($_POST['btn-update'])) {
    if (empty($_FILES['t3']['name'])) {

        $s = "update subcategory set Subcatname='" . $_POST["t1"] . "',Catid='" . $_POST["t2"] . "',Pic='" . $_POST["h1"] . "',Detail='" . $_POST["t4"] . "' where Subcatid='" . $_POST["s1"] . "'";
    } else {

        $s = "update subcategory set Subcatname='" . $_POST["t1"] . "',Catid='" . $_POST["t2"] . "',Pic='" . basename($_FILES["t3"]["name"]) . "',Detail='" . $_POST["t4"] . "' where Subcatid='" . $_POST["s1"] . "'";
    }
    $stmt = $conn->prepare($s);
    $stmt->execute();
    echo "<script>alert('Record Update');</script>";
}
?>

<body id="body">
    <div class="container">
        <div class="home">
            <a href="../index.php" class="homeBtn">Go to Home</a>
        </div>
        <main>
            <h1>SubCategory</h1>
            <h1>Update Sub-Category</h1>
            <div class="home">
                <a href="addsubcat.php" class="homeBtn">Add Subcategory</a>
                <a href="deletesubcat.php" class="homeBtn">Delete Subcategory</a>
                <a href="viewsubcat.php" class="homeBtn">View Subcategory</a>
            </div>
            <form action="updatesubcat.php" method="post" enctype="multipart/form-data">
                <select name="s1" required />
                <option value="">Select Sub-Category Name</option>
                <?php
                $s = "select * from subcategory";
                $result = $conn->prepare($s);
                $result->execute();
                $count = $result->rowCount();
                //echo $r;

                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($_POST["show"]) && $data['Subcatid'] == $_POST["s1"]) {
                        echo "<option value =" . $data['Subcatid'] . ">" . $data['Subcatname'] . "</option>";
                    } else {
                        echo "<option value=" . $data['Subcatid'] . " > " . $data['Subcatname'] . "</option>";
                    }
                }
                ?>

                </select>
                <input type="submit" value="Show" name="show" formnovalidate /><br>
                <?php
                if (isset($_POST["show"])) {
                    $s = "select * from subcategory where subcatid='" . $_POST["s1"] . "'";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    $data = $result->fetch(PDO::FETCH_ASSOC);
                    $Subcatid = $data['Subcatid'];
                    $Subcatname = $data['Subcatname'];
                    $Catid = $data['Catid'];
                    $Pic = $data['Pic'];
                    $Detail = $data['Detail'];
                }

                ?>
                <input type="text" value="<?php if (isset($_POST["show"])) {
                                                echo $Subcatname;
                                            } ?> " name="t1" placeholder="Subcategory Name"><br>


                <?php
                $s = "select * from category";
                $result = $conn->prepare($s);
                $result->execute();
                $count = $result->rowCount();
                ?>
                <select name="t2" value="<?php if (isset($_POST["show"])) {
                                                echo $Catid;
                                            } ?> " required="required" />
                <option value="Select">Select Category</option>
                <?php

                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($_POST["show"]) && $data['Cat_id'] == $Catid) {
                        echo "<option value=" . $data['Cat_id'] . ">" . $data['Cat_name'] . "</option>";
                    } else {
                        echo "<option value=" . $data['Cat_id'] . "> " . $data['Cat_name'] . "</option>";
                    }
                }
                ?>
                </select><br>
                <h2>Old Pic</h2><br>
                <img src="upload/<?php echo @$Pic; ?>" width="150px" height="100px" />
                <input type="hidden" name="h1" value="<?php if (isset($_POST["show"])) {
                                                            echo $Pic;
                                                        } ?>" /><br>
                <h2>Upload Pic</h2>
                <input type="file" name="t3" /><br>
                <input type="text" name="t4" value="<?php if (isset($_POST["show"])) {
                                                        echo $Detail;
                                                    } ?>" placeholder="Details"><br>

                <input type="submit" name="btn-update" value="Update">

            </form>
        </main>
        <?php include 'include/sidebar.php' ?>
    </div>
</body>

</html>