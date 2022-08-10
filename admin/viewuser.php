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
            <h1>Users</h1>
            <h1>View Users</h1>
            <div class="home">
                <a href="deleteuser.php" class="homeBtn">Delete User</a>
            </div>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Contact</th>
                        <th>Username</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $s = "select * from users";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['mobilenumber']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo '<img src="../user/upload/' . $row['image'] . '" alt="pic1" style="width: 100px;height:100px;">'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>