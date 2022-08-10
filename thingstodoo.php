<?php include "./include/dbconn.php";
session_start(); ?>
<?php
if (isset($_GET['ad_id'])) {
    $adventure_id = $_GET['ad_id'];
    $s = "select * from things WHERE post_adventure_id = $adventure_id";
    $result = $conn->prepare($s);
    $result->execute();
    $count = $result->rowCount();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $title = $row['todoname'];
        $quote = $row['quote'];
        $detail = $row['detail'];
        $bestplace = $row['bestplace'];
        $image1 = $row['image1'];
        $image2 = $row['image2'];
        $image3 = $row['image3'];
        $image4 = $row['image5'];
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Trekking</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/thingstodoo.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        </head>

        <body>
            <?php include('include/header.php');  ?>
            <div class="bg">
                <img src="assets/trekingimage/trek1.jpg" alt="#">
            </div>
            <main>
                <div class="section">
                    <h1><?php echo $title ?></h1>
                    <h3>"<?php echo $quote ?>"</h3>
                    <a href="login.php" class="btnone">Sign-In Now</a>
                </div>
            </main>

            <!-- about trekking-->
            <div class="about-section">
                <div class="about-section1">
                    <div class="about-head">
                        <h1>About</h1>
                    </div>
                    <div class="paragraph">
                        <p><?php echo $detail ?></p>
                    </div>
                </div>
            </div>


            <!-- grid gallery -->

            <div class="container">
                <div class="container-1">
                    <div class="gallery-head">
                        <h1>Best Images of <?php echo $title ?></h1>
                    </div>
                    <div class="gallery">
                        <figure class="item1">
                            <img src="assets/things/<?php echo $image1 ?>" alt=" Gallery image 1" class="gallery__img">
                        </figure>
                        <figure class="item2">
                            <img src="assets/things/<?php echo $image2 ?>" alt="Gallery image 2" class="gallery__img">
                        </figure>
                        <figure class="item3">
                            <img src="assets/things/<?php echo $image4 ?>" alt="Gallery image 3" class="gallery__img">
                        </figure>
                        <figure class="item4">
                            <img src="assets/things/<?php echo $image3 ?>" alt="Gallery image 4" class="gallery__img">
                        </figure>
                    </div>
                </div>
            </div>
    <?php }
} ?>
    <!--Footer End-->
    <?php include('include/footer.php'); ?>
        </body>

        </html>