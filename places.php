<?php include "./include/dbconn.php";
session_start();
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $s = "select * from places WHERE id = $id";
    $result = $conn->prepare($s);
    $result->execute();
    $count = $result->rowCount();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $placesname = $row['placesname'];
        $quote = $row['quote'];
        $detail = $row['detail'];
        $pic1 = $row['pic1'];
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Mustang</title>
            <link rel="stylesheet" href="css/places.css">
            <link rel="stylesheet" href="css/style.css">
            <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        </head>

        <body>
            <?php include('include/header.php'); ?>
            <!-- images -->
            <div class="bg">
                <img src="admin/upload/<?php echo $pic1 ?>" alt="#">
            </div>
            <main>
                <div class="section">
                    <h1><?php echo $placesname ?></h1>
                    <h3>"<?php echo $quote ?>"</h3>

                    <a href="login.php" class="btnone">Sign-In Now</a>
                </div>
            </main>

            <!-- about mustang -->
            <div class="about-sections">
                <div class="abouts">
                    <div class="about-heads">
                        <h1>About</h1>
                    </div>
                    <div class="paragraph">
                        <p><?php echo $detail; ?></p>
                    </div>
                </div>
            </div>

            <div class="container-image1">
                <?php
                $sql1 = "SELECT * FROM bestplaces WHERE placesid = :placesid";
                $stmt = $conn->prepare($sql1);
                $stmt->bindParam(':placesid', $id);
                $stmt->execute();
                while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="container-1">
                        <div class="gallery-head">
                            <h1>Best Places To Visit</h1>
                        </div>
                        <!-- Places Cards-->
                        <div class="gallery">
                            <figure class="item1">
                                <h1><?php echo $rows['picname1']; ?></h1>
                                <img src="assets/bestplaces/<?php echo $rows['pic1'] ?>" alt="Gallery image 1" class="gallery__img">
                            </figure>
                            <figure class="item2">
                                <h1><?php echo $rows['picname2']; ?></h1>
                                <img src="assets/bestplaces/<?php echo $rows['pic2'] ?>" alt="Gallery image 2" class="gallery__img">
                            </figure>
                            <figure class="item3">
                                <h1><?php echo $rows['picname3']; ?></h1>
                                <img src="assets/bestplaces/<?php echo $rows['pic3'] ?>" alt="Gallery image 3" class="gallery__img">
                            </figure>
                            <figure class="item4">
                                <h1><?php echo $rows['picname4']; ?></h1>
                                <img src="assets/bestplaces/<?php echo $rows['pic4'] ?>" alt="Gallery image 4" class="gallery__img">
                            </figure>
                            <figure class="item5">
                                <h1><?php echo $rows['picname5']; ?></h1>
                                <img src="assets/bestplaces/<?php echo $rows['pic5'] ?>" alt="Gallery image 1" class="gallery__img">
                            </figure>
                            <figure class="item6">
                                <h1><?php echo $rows['picname6']; ?></h1>
                                <img src="assets/bestplaces/<?php echo $rows['pic6'] ?>" alt="Gallery image 2" class="gallery__img">
                            </figure>
                        </div>
                    </div>
            </div>
<?php
                }
            }
        } ?>
<?php include('include/footer.php'); ?>
<!-- End Places cards -->
        </body>

        </html>