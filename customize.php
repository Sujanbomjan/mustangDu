<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <?php include('include/header.php') ?>
    <div class="bg">
        <img src="./assets/trekingimage/trek7.jpg" alt="#">
    </div>
    <section class="register-section">
        <div class="register-container1">
        <h1 class="title_head">Packages Includes</h1>
            <form class="user-form" action="#.php" method="post">
                <h2>People and Price:</h2>
                <div class="form-control-register">
                    <input type="number" class="space-btw" name="nopeople" placeholder="No. of People" required />
                    <input type="text" class="space-btw" name="price" placeholder="Price" required />
                </div>
                <h2>Tour Duration:</h2>
                <div class="form-control-register">
                    <input type="text" class="space-btw" name="duration1" placeholder="Days" value="3 days" required />
                    <input type="text" class="space-btw" name="duration1" placeholder="Night" value="2 days" required />
                </div>
                <h2>Places Included:</h2>
                <div class="form-control-register">
                    <input type="text" class="space-btw" name="places1" placeholder="Address" required />
                    <input type="text" class="space-btw" name="places2" placeholder="Pashupati Temple" required />
                </div>
                <div class="form-control-register">
                    <input type="text" class="space-btw" name="places3" placeholder="Address" required />
                    <input type="text" class="space-btw" name="places4" placeholder="Bouddhanath" required />
                </div>
                <div class="form-control-register">
                    <input type="text" class="space-btw" name="places5" placeholder="Address" required />
                    <input type="text" class="space-btw" name="places6" placeholder="Gokarnashwor" required />
                </div>
                <div class="register-btn">
                    <input type="submit" name="submit" class="button-login" value="Register">
                </div>
                <a href="login.php">Already have an account? Login</a>
            </form>
        </div>
    </section>
    <?php include('include/footer.php') ?>
</body>

</html>