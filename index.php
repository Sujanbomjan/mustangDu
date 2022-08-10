<?php session_start();
include 'include/dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <section id="header">

        <!--Navbar-->
        <?php include 'include/header.php'; ?>
        <div class="bg">
            <img src="./assets/images/bg.jpg" alt="#">
        </div>
        <!--Navbar End-->
        <main>
            <div class="section">

                <h1>Heaven is a myth, Nepal is real!</h1>
                <h3>Travel with us!</h3>
                <h3> Kathmandu-Pokhara-Mustang</h3>
                <a href="login.php" class="btnone">Sign-In Now</a>

            </div>
        </main>
    </section>
    <section id="body">
        <!--Places Cards-->
        <div class="container">
            <?php
            $sql = "SELECT * FROM places";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="cards">
                    <div class="card">

                        <img src="admin/upload/<?php echo $row['pic1'] ?>" alt="" />
                    </div>
                    <div class="details">
                        <h3><?php echo $row['placesname']; ?></h3>
                        <p>
                            <?php echo $row['detail']; ?>
                        </p>
                        <a href="places.php?id=<?php echo $row['id'] ?>" class="btn">Explore more</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!--End Places cards-->

    <!--About us-->
    <section id="about">
        <div class="about">
            <div class="inner-section">
                <h1>About Us</h1>
                <hr />
                <p class="text">
                    We provide user the best travelling packages which includes best foods, hotels, professional guides.
                    We will provide the user their photography and videography throughout their trip. We will provide the special gift
                    to travellers.
                    We look through our travellers happiness.
                </p>
                <ul class="socials">
                    <li>
                        <a href="https://www.facebook.com/factsaboutmynepal"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/travellersofnepal/"><i class="fab fa-instagram"></i> </i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/?lang=en"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/watch?v=xBHScr_gJuQ"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--End About us-->

    <!--Hot Tour Start-->
    <section class="hot-tour">
        <h1 class="section-title">Hot Packages</h1>
        <div class="border"></div>

        <div class="pricing">
            <div class="pricing-card">
                <?php
                $sql = "SELECT * FROM subcategory WHERE Subcatid = 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                ?>
                    <h3 class="pricing-card-header"><?php echo $row['Subcatname'] ?></h3>
                <?php } ?>
                <?php
                $sql = "SELECT * FROM package WHERE subcategory = 1 ";
                $stmt = $conn->prepare($sql);

                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="price"><sup>Rs</sup><?php echo $row['Packprice'] ?><span>/person</span></div>
                <?php } ?>
                <?php
                $sql = "SELECT * FROM include WHERE packid = 1";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <ul>
                        <li><?php echo $row['duration'] ?></li>
                        <li><?php echo $row['vehicle'] ?></li>
                        <li><?php echo $row['hotel'] ?></li>
                        <li><?php echo $row['transfer'] ?></li>
                    </ul>

                    <a href="package.php?subcatid=1?>&subcatname=Religious Tour To Kathmandu" class="order-btn">Book Now</a>
                <?php } ?>
            </div>

            <?php
            $sql = "SELECT * FROM subcategory WHERE Subcatid = 5";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            ?>
                <div class="pricing-card">

                    <h3 class="pricing-card-header"><?php echo $row['Subcatname'] ?></h3>
                <?php } ?>
                <?php
                $sql = "SELECT * FROM package WHERE subcategory = 5 ";
                $stmt = $conn->prepare($sql);

                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="price"><sup>Rs</sup><?php echo $row['Packprice'] ?><span>/person</span></div>
                <?php } ?>
                <?php
                $sql = "SELECT * FROM include WHERE packid = 2";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <ul>
                        <li><?php echo $row['duration'] ?></li>
                        <li><?php echo $row['vehicle'] ?></li>
                        <li><?php echo $row['hotel'] ?></li>
                        <li><?php echo $row['transfer'] ?></li>
                    </ul>

                    <a href="package.php?subcatid=5?>&subcatname=Family Tour To Pokhara" class="order-btn">Book Now</a>
                <?php } ?>
                </div>
                <?php
                $sql = "SELECT * FROM subcategory WHERE Subcatid = 9";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                ?>

                    <div class="pricing-card">

                        <h3 class="pricing-card-header"><?php echo $row['Subcatname'] ?></h3>
                    <?php } ?>
                    <?php
                    $sql = "SELECT * FROM package WHERE subcategory = 9 ";
                    $stmt = $conn->prepare($sql);

                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="price"><sup>Rs</sup><?php echo $row['Packprice'] ?><span>/person</span></div>
                    <?php } ?>
                    <?php
                    $sql = "SELECT * FROM include WHERE  packid = 3";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <ul>
                            <li><?php echo $row['duration'] ?></li>
                            <li><?php echo $row['vehicle'] ?></li>
                            <li><?php echo $row['hotel'] ?></li>
                            <li><?php echo $row['transfer'] ?></li>
                        </ul>

                        <a href="package.php?subcatid=9?>&subcatname=Adventure Tour To Mustang" class="order-btn">Book Now</a>
                    <?php } ?>
                    </div>
        </div>
        </div>
    </section>
    <!--Hot Tour End-->

    <!--Our Team
    <section class="our-team">
        <h1 class="section-title">Our Team</h1>
        <div class="border"></div>

        <div class="profiles">
            <div class="profile">
                <img src="assets/images/img2.jpg" class="profile-img">

                <h3 class="user-name">Hero</h3>
                <h5>Project Manager</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum eveniet soluta hic sunt sit reprehenderit.</p>
            </div>
            <div class="profile">
                <img src="assets/images/img3.jpg" class="profile-img">

                <h3 class="user-name">Bakugo</h3>
                <h5>Project Manager</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam facilis sint quod.</p>
            </div>
            <div class="profile">
                <img src="assets/images/img1.jpg" class="profile-img">

                <h3 class="user-name">Deku</h3>
                <h5>Project Manager</h5>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, eveniet!</p>
            </div>
        </div>
    </section>-->
    <!--Our Team End-->

    <!--contact-form-->
    <section class="contact">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Contact Us</h2>
                <form action="contact.php" method="post">
                    <input type="text" class="field" name="name" placeholder="Your Name">
                    <input type="text" class="field" name="email" placeholder="Your Email">
                    <input type="text" class="field" name="number" placeholder="Phone">
                    <textarea placeholder="Message" name="message" class="field"></textarea>
                    <button type="submit" name="send" class="btn-send">Send</button>
                </form>
            </div>
        </div>
    </section>
    <!--Footer Start-->
    <?php include 'include/footer.php' ?>
    <!--Footer End-->
</body>

</html>