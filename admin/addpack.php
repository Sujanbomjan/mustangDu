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
    $pack = $_POST['packid'];
    $cat = $_POST['user'];
    $scat = $_POST['scat'];
    $price = $_POST['price'];
    $packname = $_POST['packname'];

    $stmt = $conn->prepare('INSERT INTO package(Packid,Category,Packname,Subcategory,Packprice) VALUES (:pack,:category,:packname,:subcate,:price)');
    $stmt->bindParam(':pack', $pack);
    $stmt->bindParam(':category', $cat);
    $stmt->bindParam(':subcate', $scat);
    $stmt->bindParam(':packname', $packname);
    $stmt->bindParam(':price', $price);

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
            <h1>Package</h1>
            <h1>Add Package</h1>
            <div class="home">
                <a href="viewpackage.php" class="homeBtn">View Package</a>
                <a href="deletepackage.php" class="homeBtn">Delete Package</a>
                <a href="updatepack.php" class="homeBtn">Update Package</a>
            </div>
            <form action="addpack.php" method="post" enctype="multipart/form-data">
                <select name="packid" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <input type="text" name="packname" placeholder="Package Name" required><br>
                <select name="user" required>
                    <option value="">SELECT CATEGORY</option>
                    <?php
                    $s = "select * from category";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        if (isset($_POST["show"]) && $row['Cat_id'] == $_POST["user"]) {
                            echo "<option value =" . $row['Cat_id'] . " selected>" . $row['Cat_name'] . "</option>";
                        } else {
                            echo "<option value =" . $row['Cat_id'] . ">" . $row['Cat_name'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Show" name="show" formnovalidate /><br>
                <select name="scat" required>
                    <option value="">SELECT SUB-CATEGORY</option>
                    <?php
                    $s1 = "select * from subcategory";
                    $result = $conn->prepare($s1);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        if (isset($_POST["show"])) {
                            if ($row['Catid'] == $_POST["user"]) {
                                echo "<option value =" . $row['Subcatid'] . ">" . $row['Subcatname'] . "</option>";
                            }
                        }
                    }
                    ?>
                </select><br>
                <input type="text" name="price" placeholder="Package Price" required><br>

                <input type="submit" name="btn-add" value="Add" required>
            </form>


        </main>
        <?php include 'include/sidebar.php' ?>
    </div>
</body>

</html>