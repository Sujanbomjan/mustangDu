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
            <h1>Places</h1>
            <h1>View Places</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Places</th>
                        <th>Quotes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $s = "select * from places";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['placesname']; ?></td>
                            <td><?php echo $row['quote']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h1>Images</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image1</th>
                        <th>Image2</th>
                        <th>Image3</th>
                        <th>Image4</th>
                        <th>Image5</th>
                        <th>Image6</th>
                    </tr>
                </thead>
                <?php
                $sql1 = "SELECT * FROM bestplaces";
                $stmt = $conn->prepare($sql1);
                $stmt->execute();
                while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo '<img src="../assets/bestplaces/' . $rows['pic1'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/bestplaces/' . $rows['pic2'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/bestplaces/' . $rows['pic3'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/bestplaces/' . $rows['pic4'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/bestplaces/' . $rows['pic5'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                            <td><?php echo '<img src="../assets/bestplaces/' . $rows['pic6'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>