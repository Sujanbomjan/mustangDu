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
                <h1>Booked</h1>
                <h1>View Book</h1>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Package Name</th>
                            <th>Username</th>
                            <th>No. of People</th>
                            <th>Travelling Date</th>
                            <th>Confirm</th>
                            <th>Delete</th>
                            <th>View User</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $s = "select * from booking";
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
                                <td><?php echo $row['noofpeople']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><a href="confirm.php?id=<?php echo $row['id'] ?>&confirm=<?php echo $row['confirm']; ?>" style="color: #fff; text-decoration:underline"><?php
                                                                                                                                                                            if ($row['confirm'] == 0) {
                                                                                                                                                                                echo 'Pending';
                                                                                                                                                                            } else {
                                                                                                                                                                                echo 'Confirmed!!';
                                                                                                                                                                            } ?></a></td>
                                <td><a href="delete.php?id=<?php echo $row['id'] ?>" style="color: #fff; text-decoration:underline">Delete</a></td>
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
    echo "Please Login First";
} ?>