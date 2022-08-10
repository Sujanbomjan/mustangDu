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
            <h1>Package</h1>
            <h1>View Package</h1>
            <div class="home">
                <a href="addpack.php" class="homeBtn">Add Package</a>
                <a href="deletepackage.php" class="homeBtn">Delete Package</a>
                <a href="updatepack.php" class="homeBtn">Update Package</a>
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>PackageId</th>
                        <th>PackageName</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $s = "select * from package";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>

                            <td> <?php echo $row['id'] ?></td>
                            <td> <?php echo $row['Packid'] ?></td>
                            <td> <?php echo $row['Packname'] ?></td>
                            <td> <?php echo $row['Category'] ?></td>
                            <td> <?php echo $row['Subcategory'] ?></td>
                            <td> <?php echo $row['Packprice'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>