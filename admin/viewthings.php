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
            <h1></h1>
            <h1>View Things To Do</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Places</th>
                        <th>Quotes</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>Image 4</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    $s = "select * from things";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>

                            <td> <?php echo $row['id'] ?></td>
                            <td> <?php echo $row['todoname'] ?></td>
                            <td> <?php echo $row['quote'] ?></td>
                            <td><?php echo '<img src="../assets/things/' . $row['image1'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/things/' . $row['image2'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/things/' . $row['image3'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/things/' . $row['image5'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>