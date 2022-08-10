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
            <h1>Category</h1>
            <h1>View Category</h1>
            <div class="home">
                <a href="addcat.php" class="homeBtn">Add Category</a>
                <a href="deletecategory.php" class="homeBtn">Delete Category</a>
                <a href="updatecat.php" class="homeBtn">Update Category</a>
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $s = "select * from category";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Cat_id']; ?></td>
                            <td><?php echo $row['Cat_name']; ?></td>
                            <td><?php echo '<img src="upload/category/' . $row['img'] . '" alt="pic1" style="width: 180px;height:100px;">'; ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>