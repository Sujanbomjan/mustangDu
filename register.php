<?php require_once('user/register-user.php');
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<body>

    <?php include 'include/header.php'; ?>
    <section class="register-section">
        <div class="register-container">
            <p class="title">Register</p>
            <div class="separator"></div>
            <p class="welcome-message">
                Please fill the form
            </p>

            <?php
            if (isset($_GET['msg'])) {
            ?>
                <div class="msg" style="background: #dc143c; height: 25px; width: 600px;margin-bottom: 13px;">
                    <?php
                    echo "<p style='color: white;text-align: center;'>" . $_GET['msg'] . "</p>"; ?>
                </div>
            <?php } ?>

            <form class="user-form" action="user/register-user.php" method="post" enctype="multipart/form-data">
                <div class="form-control-register">
                    <br><input type="text" name="fullname" placeholder="Name" required />

                </div>
                <div class="form-control-register">
                    <input type="text" class="space-btw" name="address" placeholder="Address" required />
                    <input type="text" class="space-btw" name="contact" placeholder="Contact Number" required />
                </div>
                <div class="form-control-register">
                    <input type="email" name="email" placeholder="Email" required />
                </div>

                <div class="form-control-register">
                    <input type="text" name="username" placeholder="Username" required />
                </div>
                <div class="form-control-register">
                    <input type="password" class="space-btw" name="password" placeholder="Password" required />
                    <input type="password" class="space-btw" name="conPass" placeholder="Confirm Password" required />
                </div>
                <div class="form-control-register">
                    <h3 style="color: #fff;">Upload Profile</h3>
                    <input type="file" name="profile" />
                </div>
                <div class="register-btn">
                    <input type="submit" name="submit" class="button-login" value="Register">
                </div>
                <a href="login.php">Already have an account? Login</a>
            </form>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>
</body>

</html>