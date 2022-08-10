<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="css/user-setting.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>

<body>
    <?php include('include/header.php');
    include('include/dbconn.php'); ?>
    <section class="user-profile">
        <div class="user-details">
            <h1>Your Details</h1>
            <hr>
            <?php
            $username = $_SESSION['username'];
            $s = "SELECT * FROM users WHERE username = :username";
            $result = $conn->prepare($s);
            $result->bindParam(':username', $username);
            $result->execute();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <?php echo '<img src="user/upload/' . $row['image'] . '" class="profile-img">'; ?>

                <h1><?php echo $row['username']; ?></h1>
                <hr>
                <form action="user/setting.php" method="post">
                    <div class="details-user">
                        <h3>Fullname</h3>
                        <div class="form-control-register">
                            <input type="text" name="fullname" placeholder="<?php echo $row['fullname']; ?>" />
                        </div>
                        <input type="submit" name="change-name" value="Change" class="btn-change">
                    </div>
                    <hr>
                    <div class="details-user">
                        <h3>Address </h3>
                        <div class="form-control-register">
                            <input type="text" name="address" placeholder="<?php echo $row['address']; ?>" />
                        </div>
                        <input type="submit" name="change-address" value="Change" class="btn-change">
                    </div>
                    <hr>
                    <div class="details-user">
                        <h3>Contact </h3>
                        <div class="form-control-register">
                            <input type="text" name="contact" placeholder="<?php echo $row['mobilenumber']; ?>" />
                        </div>
                        <input type="submit" name="change-contact" value="Change" class="btn-change">
                    </div>
                    <hr>
                    <div class="details-user">
                        <h3>Password</h3>
                        <div class="form-control-register">
                            <input type="password" name="current-pw" placeholder="Current Password" />
                        </div>
                        <div class="form-control-register">
                            <input type="password" name="new-pw" placeholder="New Password" />
                        </div>
                        <div class="form-control-register">
                            <input type="password" name="con-pw" placeholder="Confirm Password" />
                        </div>
                        <input type="submit" name="change-pw" value="Change" class="btn-change">

                    </div>
                    <hr>
                    <input type="submit" name="delete_acc" value="Delete Account" class="btn-delete" onClick="return confirm('Are you sure?')(<?php echo $row['id']; ?>)">

                </form>

        </div>
    <?php } ?>
    </section>


    <?php include('include/footer.php'); ?>
    <script language="javascript">
        function deleteme(delid) {
            if (confirm("Do you want to delete?")) {

                if (true) {
                    window.location.href = 'user/setting.php';
                } else {
                    window.location.href = 'user-setting.php';
                }
            }
        }
    </script>
</body>

</html>