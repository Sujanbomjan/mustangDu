<?php
include 'include/dbconn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/subcat.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <?php include 'include/header.php'; ?>
    <!-- image container -->
    <div class="bg">
        <img src="./assets/trekingimage/trek5.jpeg" alt="#">
    </div>
    <main>
        <div class="section">
            <h1><?php $catname = $_GET['Catname'];
                echo $catname; ?></h1>
            <h3>“Look, Click and Book”</h3>

            <a href="login.php" class="btnone">Sign-In Now</a>
        </div>
    </main>

    <h1 class="title_head">Packages</h1>
    <section id="body">
        <!--Places Cards-->

        <div class="container1">
            <?php
            if (isset($_GET['Catid'])) {
                $catid = $_GET['Catid'];
                $s = "select * from subcategory WHERE Catid = :catid";
                $result = $conn->prepare($s);
                $result->bindParam(':catid', $catid);
                $result->execute();
                $count = $result->rowCount();
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <div class="cards">
                        <?php
                        $id = $row['Subcatid'];
                        $sql = "SELECT * FROM package WHERE Subcategory = :subcat";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':subcat', $id);
                        $stmt->execute();
                        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="card">
                                <h1>Rs.<?php echo $rows['Packprice']; ?></h1>
                                <img src="admin/upload/<?php echo $row['Pic']; ?>" alt="" />
                            </div>
                            <div class="details">
                                <h3><?php echo $row['Subcatname']; ?></h3>
                                <?php
                                $packid = $rows['Packid'];
                                $sql = "SELECT * FROM include WHERE packid = :packid";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(':packid', $packid);
                                $stmt->execute();
                                while ($rows1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <ul style="color: #fff;">
                                        <li><?php echo $rows1['duration']; ?></li><br>
                                        <li><?php echo $rows1['vehicle']; ?></li><br>
                                        <li><?php echo $rows1['transfer']; ?></li>
                                    </ul>


                                    <a href="package.php?subcatid=<?php echo $row['Subcatid'] ?>&subcatname=<?php echo $row['Subcatname'] ?>" class="btn">Show Packages</a>
                            <?php }
                            } ?>
                            </div>
                    </div>
            <?php
                }
            }

            ?>
        </div>
    </section>



    <?php include 'include/footer.php' ?>
</body>

</html>