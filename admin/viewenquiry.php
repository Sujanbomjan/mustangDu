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
            <h1>Enquiry</h1>
            <h1>View Enquiry</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>EnquiryId</th>
                        <th>UserName</th>
                        <th>Package Name</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $s = "select * from enquiry";
                    $result = $conn->prepare($s);
                    $result->execute();
                    $count = $result->rowCount();
                    //echo $r;

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Enquiryid']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['packname']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['Message']; ?></td>
                            <td><a href="deleteEnquiry.php?id=<?php echo $row['Enquiryid'] ?>" style="color: #fff; text-decoration:underline">Delete</a></td>
                            <td><a href="viewBookUser.php?username=<?php echo $row['fullname'] ?>" style="color: #fff; text-decoration:underline">View User</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
        <?php include('include/sidebar.php') ?>
    </div>
</body>

</html>