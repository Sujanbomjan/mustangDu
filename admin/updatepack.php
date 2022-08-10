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
    $s = "update package set Packname='" . $_POST["t1"] . "',Category='" . $_POST["t2"] . "',Subcategory='" . $_POST["t3"] . "',Packprice='" . $_POST["t4"]  . "' where Subcategory='" . $_POST["t3"] . "'";
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
            <h1>Package</h1>
            <h1>Update Package</h1>
            <div class="home">
                <a href="addpack.php" class="homeBtn">Add Package</a>
                <a href="deletepackage.php" class="homeBtn">Delete Package</a>
                <a href="viewpackage.php" class="homeBtn">View Package</a>
            </div>
            <form action="updatepack.php" method="post" enctype="multipart/form-data">
                <select name="s1" required />
                <option value="">Select Package Name</option>
                <?php
                $s = "select * from package";
                $result = $conn->prepare($s);
                $result->execute();
                $count = $result->rowCount();
                //echo $result;

                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($_POST["show"]) && $data['Packid'] == $_POST["s1"]) {
                        echo "<option value =" . $data['Packid'] . " selected>" . $data['Packname'] . "</option>";
                    } else {
                        echo "<option value=" . $data['Packid'] . " > " . $data['Packname'] . "</option>";
                    }
                }
                ?>

                </select>
                <input type="submit" value="Show" name="show" formnovalidate /><br>
                <?php
                if (isset($_POST["show"])) {
                    $s = "select * from package where Packid='" . $_POST["s1"] . "'";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    $data = $result->fetch(PDO::FETCH_ASSOC);
                    $Packid = $data['Packid'];
                    $Packname = $data['Packname'];
                    $Category = $data['Category'];
                    $Subcategory = $data['Subcategory'];
                    $Packprice = $data['Packprice'];
                }

                ?>
                <input type="text" value="<?php if (isset($_POST["show"])) {
                                                echo $Packname;
                                            } ?> " name="t1" placeholder="Package Name" required><br>


                <?php
                $s = "select * from category";
                $result = $conn->prepare($s);
                $result->execute();
                $count = $result->rowCount();
                ?>
                <select name="t2" value="<?php if (isset($_POST["show"])) {
                                                echo $Category;
                                            } ?> " required="required" />
                <option value="Select">Select Category</option>
                <?php

                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($_POST["show"]) && $data['Cat_id'] == $Catid) {
                        echo "<option value=" . $data['Cat_id'] . " selected>" . $data['Cat_name'] . "</option>";
                    } else {
                        echo "<option value=" . $data['Cat_id'] . "> " . $data['Cat_name'] . "</option>";
                    }
                }
                ?>
                </select><br>
                <select name="t3" />
                <option value="">Select Sub-Category</option>
                <?php
                $s = "select * from subcategory";
                $result = $conn->prepare($s);
                $result->execute();
                $count = $result->rowCount();
                ?>
                <?php

                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($_POST["show"]) && $data['Subcatid'] == $Subcategory) {
                        echo "<option value=" . $data['Subcatid'] . " selected>" . $data['Subcatname'] . "</option>";
                    } else {
                        echo "<option value=" . $data['Subcatid'] . "> " . $data['Subcatname'] . "</option>";
                    }
                }
                ?>


                </select><br>

                <input type="text" name="t4" placeholder="Package Price" value="<?php if (isset($_POST["show"])) {
                                                                                    echo $Packprice;
                                                                                } ?>" required><br>



                <input type="submit" name="btn-update" value="Update">

            </form>
        </main>
        <?php include 'include/sidebar.php' ?>
    </div>
</body>

</html>