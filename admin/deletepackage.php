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
        <?php
        if (isset($_POST['submit'])) {

            $sql = "DELETE FROM package WHERE id = '" . $_POST['user'] . "'";
            $delete = $conn->prepare($sql);
            $delete->execute();
            //echo $_POST['user'];
            echo "<script>alert('Record Delete');</script>";
        }
        ?>
        <main>
            <h1>Package</h1>
            <h1>Delete Package</h1>
            <div class="home">
                <a href="addpack.php" class="homeBtn">Add Package</a>
                <a href="viewpackage.php" class="homeBtn">View Package</a>
                <a href="updatepack.php" class="homeBtn">Update Package</a>
            </div>
            <form action="deletepackage.php" method="post" class="delete">
                <select name="user">
                    <option value="">SELECT PACKAGE</option>
                    <?php
                    $s = "select * from package";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $sql1 = "ALTER TABLE Subcategory AUTO_INCREMENT = 1";
                    $delete1 = $conn->prepare($sql1);
                    $delete1->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value =" . $row['id'] . ">" . $row['Packname'] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="submit" value="Delete">
            </form>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>