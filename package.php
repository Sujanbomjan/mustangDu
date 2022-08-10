<?php session_start();
error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MustangDu</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/package.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body>
    <?php include 'include/header.php';
    $packName = $_GET['subcatname'];
    $id = $_GET['subcatid'];
    ?>
    <!-- Book Now -->
    <section class="book_now">
        <div class="overlay1">
            <div class="book">
                <div class="header">
                    <h1>Book Now</h1>
                    <i class="fas fa-times" onclick="toggleBook()"></i>
                </div>
                <div class="body">
                    <form action="book.php?id= <?php echo $_GET['subcatid'] ?> &packname=<?php echo $_GET['subcatname']; ?>" method="post">
                        No. of people:
                        <input class="form-input" type="number" name="people" placeholder="0" required><br>
                        Date:
                        <input class="form-input date" type="text" name="date" class="date" placeholder="From" required autocomplete="off"><br><br>

                        <input type="submit" name="send-book" class="btn-book form-input" value="Book">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Book Now -->
    <!-- Enquiry Now -->
    <section class="book_now">
        <div class="overlay2">
            <div class="book">
                <div class="header">
                    <h1>Ask Us Anytime</h1>
                    <i class="fas fa-times" onclick="toggleEnquiry()"></i>
                </div>
                <div class="body">
                    <form action="packages/enquiry.php?id= <?php echo $_GET['subcatid'] ?>&packname=<?php echo $_GET['subcatname']; ?>" method="post">
                        Subject:
                        <textarea name="subject"></textarea><br>
                        Enquiry:
                        <textarea name="enquiry"></textarea><br><br>
                        <input type="submit" name="sendenquiry" class="btn-book form-input" value="Send Enquiry">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Enquiry Now -->
    <!-- Customize  -->
    <section class="book_now">
        <div class="overlay3">
            <div class="book">
                <div class="header">
                    <h1>Plan your Own Trip</h1>
                    <i class="fas fa-times" onclick="toggleCust()"></i>
                </div>
                <div class="body">
                    <form action="book.php?id= <?php echo $_GET['subcatid'] ?>&packname=<?php echo $_GET['subcatname']; ?>" method="post">
                        No. of People:
                        <input class="form-input" type="number" name="people" placeholder="0" autocomplete="off" required><br>
                        No. of Days You want to stay:
                        <input class="form-input" type="number" name="day" placeholder="0" autocomplete="off" required><br>
                        Date:
                        <input class="form-input date" type="text" name="date" class="date" placeholder="From" required autocomplete="off"><br>
                        Hotel You want to Stay:<br>
                        <select name="hotel">
                            <option value="Hyatt Hotel">Hyatt Hotel</option>
                            <option value="Shangrila Hotel">Shangrila Hotel</option>
                            <option value="Mustang View Hotel">Mustang View Hotel</option>
                            <option value="Pokhara View Hotel">Pokhara View Hotel</option>
                            <option value="Pokhara Grand">Pokhara Grand</option>
                            <option value="Hotel Pokhara Piece">Hotel Pokhara Piece</option>
                            <option value="Kathmandu Mariot">Kathmandu Mariot</option>
                        </select><br>
                        Extra Activity You want to Do:<br>
                        &nbsp;<input type="checkbox" name="activity[]" value="Bungee" tabindex="1"> Bungee Jump<br>
                        &nbsp;<input type="checkbox" name="activity[]" value="Zip Lining" tabindex="2"> Zip Lining<br>
                        &nbsp;<input type="checkbox" name="activity[]" value="Rafting" tabindex="3"> Rafting<br>
                        &nbsp;<input type="checkbox" name="activity[]" value="Hiking" tabindex="4"> Hiking<br>
                        &nbsp;<input type="checkbox" name="activity[]" value="Mountain Biking" tabindex="4"> Mountain Biking<br>
                        &nbsp;<input type="checkbox" name="activity[]" value="Cycling" tabindex="4"> Cycling<br>
                        &nbsp;<input type="checkbox" name="activity[]" value="Paragliding" tabindex="4"> Paragliding<br><br>
                        Extra Places You want to Go:<br>
                        &nbsp;<input type="checkbox" name="places[]" value="Gumba" tabindex="1"> Gumbas<br>
                        &nbsp;<input type="checkbox" name="places[]" value="Dashinkali" tabindex="2"> Dashinkali<br>
                        &nbsp;<input type="checkbox" name="places[]" value="Manakamana" tabindex="3"> Manakamana<br>
                        &nbsp;<input type="checkbox" name="places[]" value="Gandruk" tabindex="4"> Ghandruk<br>
                        &nbsp;<input type="checkbox" name="places[]" value="Sukutey" tabindex="5"> Sukute<br>
                        &nbsp;<input type="checkbox" name="places[]" value="Whoppe Land" tabindex="6"> Whoppee Land<br><br>

                        <input type="submit" name="send-cust" class="btn-book form-input" value="Send Customized"><br>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- End Customize -->
    <!-- image container -->

    <div class="bg">
        <img src="./assets/trekingimage/trek7.jpg" alt="#">
    </div>
    <main>
        <div class="section">
            <h1><?php echo $_GET['subcatname']; ?></h1>
            <h3>“Look, Click and Book”</h3>
            <a href="login.php" class="btnone">Sign-In Now</a>
        </div>
    </main>
    <?php
    if (isset($_GET['msg'])) {
    ?>
        <div class="msg" style="background: #dc143c; height: 25px; width: 1000px;margin-left: 172px">
            <?php
            echo "<p style='color: white;text-align: center;'>" . $_GET['msg'] . "</p>"; ?>
        </div>
    <?php } ?>
    <?php
    if (isset($_GET['msgError'])) {
    ?>
        <div class="msg" style="background: #dc143c; height: 25px; width: 1000px;margin-left: 172px">
            <?php
            echo "<p style='color: white;text-align: center;'>" . $_GET['msgError'] . "</p>"; ?>
        </div>
    <?php } ?>
    <?php
    if (isset($_GET['subcatname'])) {
    ?>
        <section class="details-package">
            <div class="btn-detail">
                <a class="btnone" onclick="toggleBook()">Book Now</a>
                <a class="btnone" onclick="toggleCust()">Customize Trip</a>
                <a class="btnone" onclick="toggleEnquiry()">Enquiry Now</a>
            </div>
            <div class="detail">
                <?php
                $id = $_GET['subcatid'];
                $_SESSION['packname'] = $_GET['subcatid'];
                $sql = "SELECT * FROM package WHERE Subcategory = :subcat";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':subcat', $id);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $packid = $row['Packid'];
                ?>

                    <h1><?php echo $_GET['subcatname']; ?></h2><br>
                        <h1>Rs.<?php echo $row['Packprice'] ?> Per Person</h1>
                    <?php } ?>
                    <div class="separator"></div>

            </div>
            <div class="detail">
                <h2>Included</h2>
                <?php
                $sql = "SELECT * FROM include WHERE packid = :packid";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':packid', $packid);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <h2>Stay</h2>
                    <ul>
                        <li><?php echo $row['hotel'] ?></li>
                    </ul>
            </div>
            <div class="detail">
                <h2>Meal</h2>
                <ul>
                    <li><?php echo $row['meal'] ?></li>

                </ul>
            </div>
            <div class="detail">
                <h2>Activity</h2>
                <ul>
                    <li><?php echo $row['Activity'] ?></li>
                    <li>Entrance fee for different sightseeing places.</li>
                </ul>
            </div>
            <div class="detail">
                <h2>Vehicle</h2>
                <ul>
                    <li><?php echo $row['vehicle'] ?></li>
                </ul>
            </div>
            <div class="detail">
                <h2>Transfer</h2>
                <ul>
                    <li><?php echo $row['transfer'] ?></li>
                </ul>
            </div>
            <div class="detail">
                <h2>Guide</h2>
                <ul>
                    <li><?php echo $row['guide'] ?></li>
                </ul>
            </div>
        <?php } ?>
        <div class="detail">
            <?php
            $sql = "SELECT * FROM itinerary WHERE packid = :packid";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':packid', $packid);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <h2>Itinerary</h2>
                <ul>
                    <h2>Day 1:</h2>
                    <li><?php echo $row['day1']; ?></li><br>
                    <h2>Day 2:</h2>
                    <li><?php echo $row['day2']; ?></li><br>
                    <h2>Day 3:</h2>
                    <li><?php echo $row['day3']; ?></li><br>
                    <?php if (!empty($row['day4']) && !empty($row['day4'])) { ?>
                        <h2>Day 4:</h2>
                        <li><?php echo $row['day4']; ?></li><br>
                        <h2>Day 5:</h2>
                        <li><?php echo $row['day5']; ?></li><br>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>

        </section>
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

        <?php include 'include/footer.php' ?>
    <?php } ?>
</body>
<script>
    function toggleBook() {
        document.querySelector(".overlay1").classList.toggle("open");
    }

    function toggleCust() {
        document.querySelector(".overlay3").classList.toggle("open");
    }

    function toggleEnquiry() {
        document.querySelector(".overlay2").classList.toggle("open");
    }
    $(function() {
        $(".date").datepicker({
            minDate: new Date()
        });
    });
</script>

</html>