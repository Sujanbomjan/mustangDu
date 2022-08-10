<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <?php include('include/header.php'); ?>
    <!-- images -->
    <div class="bg">
        <img src="./assets/images/ktm1.jpg" alt="#">
    </div>
    <main>
        <div class="section">
            <h1>Gallery</h1>
            <h3>"Memories, Love, Happiness"</h3>

            <a href="login.php" class="btnone">Sign-In Now</a>
        </div>
    </main>
    <div class="video">
        <iframe width="900" height="500" src="https://www.youtube.com/embed/Ec8B0tK3rQE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="container-image">
        <div class="container-1">
            <div class="gallery-head">
                <h1>PhotoGraphy</h1>
            </div>
            <?php
            $sql = "SELECT * FROM gallery";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="gallery">
                    <figure class="item1">
                        <h1>Images</h1>
                        <img src="assets/things/<?php echo $row['pic'] ?>" alt="Gallery image 1" class="gallery__img">
                    </figure>
                    <figure class="item2">
                        <h1>Images</h1>
                        <img src="assets/things/<?php echo $row['pic2'] ?>" alt="Gallery image 2" class="gallery__img">
                    </figure>
                    <figure class="item3">
                        <h1>Images</h1>
                        <img src="assets/things/<?php echo $row['pic3'] ?>" alt="Gallery image 3" class="gallery__img">
                    </figure>
                    <figure class="item4">
                        <h1>Images</h1>
                        <img src="assets/things/<?php echo $row['pic4'] ?>" alt="Gallery image 4" class="gallery__img">
                    </figure>
                    <figure class="item5">
                        <h1>Images</h1>
                        <img src="assets/things/<?php echo $row['pic5'] ?>" alt="Gallery image 1" class="gallery__img">
                    </figure>
                    <figure class="item6">
                        <h1>Images</h1>
                        <img src="assets/things/<?php echo $row['pic6'] ?>" alt="Gallery image 2" class="gallery__img">
                    </figure>
                    <figure class="item7">
                        <h1>Images</h1>
                        <img src="assets/things/<?php echo $row['pic7'] ?>" alt="Gallery image 3" class="gallery__img">
                    </figure>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</body>

</html>