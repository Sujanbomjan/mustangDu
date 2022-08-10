<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <?php include('include/header.php');
    include('include/dbconn.php'); ?>
    <?php
    if (isset($_GET['bookId'])) { ?>
        <main style="margin-top: 100px;margin-bottom: 330px;">
            <h1>Booked</h1>
            <h1>User Booked</h1>
            <table class="content-table" border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Package Name</th>
                        <th>Username</th>
                        <th>No. of People</th>
                        <th>Travelling Date</th>
                        <th>Confirm</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $id = $_GET['bookId'];
                    $sql = "SELECT * FROM booking WHERE id=" . $id;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $subcatname = $row['packagename'];
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['packagename']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['noofpeople']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><a href="confirmUser.php?id=<?php echo $row['id'] ?>&confirm=<?php echo $row['confirm']; ?>" style="color: #fff; text-decoration:underline"><?php
                                                                                                                                                                            if ($row['confirm'] == 0) {
                                                                                                                                                                                echo 'Pending';
                                                                                                                                                                            } else {
                                                                                                                                                                                echo 'Confirmed!!';
                                                                                                                                                                            } ?></a></td>
                            <td><a href="delet.php?id=<?php echo $row['id'] ?>" style="color: #fff; text-decoration:underline">Delete</a></td>
                            <?php
                            $s = "select * from subcategory WHERE Subcatname =:subcatname";
                            $result = $conn->prepare($s);
                            $result->bindParam(':subcatname', $subcatname);
                            $result->execute();
                            $count = $result->rowCount();
                            //echo $r;

                            while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                                $id = $row['id'];
                            ?>
                                <td><a href="package.php?subcatid=<?php echo $rows['Subcatid'] ?>&subcatname=<?php echo $rows['Subcatname'] ?>" style="color: #fff; text-decoration:underline">View User</a></td>
                            <?php } ?>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </main>
    <?php } ?>

    <?php
    if (isset($_GET['customizedId'])) { ?>
        <main style="margin-top: 100px;margin-bottom: 330px;">
            <h1>Customized Book</h1>
            <h1>User Booked</h1>
            <table class="content-table" border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Package Name</th>
                        <th>Username</th>
                        <th>No. of People</th>
                        <th>Travelling Day</th>
                        <th>Start Date</th>
                        <th>Hotel Choice</th>
                        <th>Activity</th>
                        <th>Places</th>
                        <th>Total Price</th>
                        <th>Confirm</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = $_GET['customizedId'];
                    $sql = "SELECT * FROM customize WHERE id=" . $id;
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $subcatname = $row['packagename'];
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['packagename']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['people']; ?></td>
                            <td><?php echo $row['day']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['hotel']; ?></td>
                            <td><?php echo $row['activity']; ?></td>
                            <td><?php echo $row['places']; ?></td>
                            <td><?php echo $row['totalPrice']; ?></td>
                            <td><a href="confirmCustUser.php?id=<?php echo $row['id'] ?>&confirm=<?php echo $row['confirm']; ?>" style="color: #fff; text-decoration:underline"><?php
                                                                                                                                                                                if ($row['confirm'] == 0) {
                                                                                                                                                                                    echo 'Pending';
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo 'Confirmed!!';
                                                                                                                                                                                } ?></a></td>
                            <td><a href="delete-Cust.php?id=<?php echo $row['id'] ?>" style="color: #fff; text-decoration:underline">Delete</a></td>
                            <?php
                            $s = "select * from subcategory WHERE Subcatname =:subcatname";
                            $result = $conn->prepare($s);
                            $result->bindParam(':subcatname', $subcatname);
                            $result->execute();
                            $count = $result->rowCount();
                            //echo $r;

                            while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                                $id = $row['id'];
                            ?>
                                <td><a href="package.php?subcatid=<?php echo $rows['Subcatid'] ?>&subcatname=<?php echo $rows['Subcatname'] ?>" style="color: #fff; text-decoration:underline">View Package</a></td>
                            <?php } ?>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </main>
    <?php } ?>
    <?php include('include/footer.php'); ?>
</body>

</html>