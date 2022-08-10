<?php
session_start();
include('../include/dbconn.php');
if (isset($_SESSION['adminname'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/admin.css" />
    <title>MustangDu</title>
  </head>

  <body id="body">
    <div class="container">
      <div class="home">
        <a href="../index.php" class="homeBtn">Go to Home</a>
      </div>
      <main>
        <h1>Welcome Admin</h1>
        <div class="main__container">

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <div class="card">
              <div class="card_inner">
                <?php
                $sql = "SELECT username FROM users";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->rowCount();
                ?>
                <p class="text">Number of user</p><br>
                <span class="font-bold text-title"><?php echo $result; ?></span>
              </div>
            </div>

            <div class="card">
              <div class="card_inner">
                <?php
                $sql = "SELECT * FROM package";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->rowCount();
                ?>
                <p class="text">Total Package</p><br>
                <span class="font-bold text-title"><?php echo $result; ?></span>
              </div>
            </div>
            <div class="card">
              <div class="card_inner">
                <?php
                $sql = "SELECT * FROM thingstodo";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->rowCount();
                ?>
                <p class="text">Total Things to do</p><br>
                <span class="font-bold text-title"><?php echo $result; ?></span>
              </div>
            </div>
            <div class="card">
              <div class="card_inner">
                <?php
                $sql = "SELECT * FROM places";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->rowCount();
                ?>
                <p class="text">Total Places</p><br>
                <span class="font-bold text-title"><?php echo $result; ?></span>
              </div>
            </div>
          </div>
      </main>

      <?php include('include/sidebar.php') ?>
    </div>
  <?php } else {
  echo "Please Login First";
} ?>
  </body>

  </html>