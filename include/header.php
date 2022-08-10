<?php include "dbconn.php";
?>
<!--Navbar-->
<div class="top-nav">
    <?php
    if (isset($_SESSION["adminname"])) { ?>
        <a href="admin/dashboard.php">Dashboard</a>
    <?php } else { ?>
        <a href="admin/admin-login.php">Admin Login</a>
    <?php } ?>
</div>
<nav>
    <div class="wrapper">
        <div class="logo">
            <a href="./index.php"><img src="./assets/images/logo.png" alt=""></a>
        </div>
        <input type="radio" name="slider" id="menu-btn" />
        <input type="radio" name="slider" id="close-btn" />
        <ul class="nav-links">
            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i>
            </label>
            <li><a href="./index.php">Home</a></li>
            <li>
                <a href="#" class="dropdown-item">Places to See <span class="fas fa-chevron-down"></span></a>
                <input type="checkbox" id="showDrop" />
                <label for="showDrop" class="mobile-dropdown-item">Places To See<span class="fas fa-chevron-down"></span></label>
                <ul class="drop-menu">
                    <li><a href="<?php echo './places.php?id=1' ?>">Kathmandu</a></li>
                    <li><a href="<?php echo './places.php?id=2' ?>">Pokhara</a></li>
                    <li><a href="<?php echo './places.php?id=3' ?>">Mustang</a></li>

                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-item">Things To Do<span class="fas fa-chevron-down"></span>
                </a>
                <input type="checkbox" id="showMega" />
                <label for="showMega" class="mobile-dropdown-item">Things To Do<span class="fas fa-chevron-down"></span>
                </label>
                <div class="mega-box">
                    <div class="content">
                        <div class="row">
                            <img src="assets/images/navimg.jpg" alt="" />
                        </div>
                        <div class="row">
                            <header>Adventures</header>
                            <ul class="mega-items">
                                <?php
                                $s = "select * from thingstodo LIMIT 0, 6";
                                $result = $conn->prepare($s);
                                $result->execute();
                                $count = $result->rowCount();

                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    $ad_id = $row['adventure_id'];
                                    $ad_name = $row['adventure_name'];
                                    echo "<li><a href='./thingstodoo.php?ad_id=$ad_id'>$ad_name</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="row">
                            <header>Nature</header>
                            <ul class="mega-items">
                                <?php
                                $s = "select * from thingstodo WHERE adventure_id >= 7 AND adventure_id <= 14";
                                $result = $conn->prepare($s);
                                $result->execute();
                                $count = $result->rowCount();

                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    $ad_id = $row['adventure_id'];
                                    $ad_name = $row['adventure_name'];
                                    echo "<li><a href='./thingstodoo.php?ad_id=$ad_id'>$ad_name</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="row">
                            <header>Culture</header>
                            <ul class="mega-items">
                                <?php
                                $s = "select * from thingstodo WHERE adventure_id >= 15 AND adventure_id <= 20";
                                $result = $conn->prepare($s);
                                $result->execute();
                                $count = $result->rowCount();

                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    $ad_id = $row['adventure_id'];
                                    $ad_name = $row['adventure_name'];
                                    echo "<li><a href='./thingstodoo.php?ad_id=$ad_id'>$ad_name</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li><a href="./plans.php">Plan Your Trip</a></li>
            <li><a href="./gallery.php">Gallery</a></li>
            <?php if (isset($_SESSION["username"])) { ?>
                <li><a href="#"><?php echo $_SESSION['username']; ?></a>
                    <ul class="drop-menu">
                        <li><a href="./user-profile.php">Profile</a></li>
                        <li><a href="./user-setting.php">Setting</a></li>
                        <li><a href="user/logout.php">Log Out</a></li>
                    </ul>
                <?php } ?>
                </li>
        </ul>
        <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i>
        </label>
    </div>
</nav>
<!--Navbar End-->