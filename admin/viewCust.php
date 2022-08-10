<?php include('../include/dbconn.php');
session_start();
if (isset($_SESSION['adminname'])) {
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
                <h1>User Customized</h1>
                <h1>Customized Booking</h1>
                <table class="content-table">
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

                        $s = "select * from customize";
                        $result = $conn->prepare($s);
                        $result->execute();
                        $count = $result->rowCount();
                        //echo $r;

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $id = $row['id'];
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
                                <td><?php if ($row['totalPrice'] == 0) { ?>
                                        <a href="addTotalprice.php?id=<?php echo $row['id'] ?>" style="color: #fff; text-decoration:underline">Add Price</a>
                                    <?php } else {
                                        echo $row['totalPrice'];
                                    } ?></td>
                                <td><a href="confirmCust.php?id=<?php echo $row['id'] ?>&confirm=<?php echo $row['confirm']; ?>" style="color: #fff; text-decoration:underline"><?php
                                                                                                                                                                                if ($row['confirm'] == 0) {
                                                                                                                                                                                    echo 'Pending';
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo 'Confirmed!!';
                                                                                                                                                                                } ?></a></td>
                                <td><a href="deleteCust.php?id=<?php echo $row['id'] ?>" style="color: #fff; text-decoration:underline">Delete</a></td>
                                <td><a href="viewBookUser.php?username=<?php echo $row['username'] ?>" style="color: #fff; text-decoration:underline">View User</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </main>
            <?php include('include/sidebar.php') ?>
        </div>
    </body>

    </html>
<?php  } else {
    header('Location: admin-login.php');
} ?>