<?php include('include/dbconn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MustangDu</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/plans.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <?php include('include/header.php'); ?>
  <!-- image container -->
  <div class="bg">
    <img src="./assets/trekingimage/trek5.jpeg" alt="#">
  </div>
  <main>
    <div class="section">
      <h1>EXPLORE</h1>
      <h3>“FILL YOUR LIFE WITH ADVENTURES, NOT THINGS. HAVE STORIES<br> TO TELL NOT STUFF TO SHOW.”</h3>

      <a href="login.php" class="btnone">Sign-In Now</a>
    </div>
  </main>

  <!-- feature locations -->
  <div class="feature">
    <div class="head">
      <h1>Planning For What?</h1>
    </div>
    <div class="feature-1">
      <?php
      $s = "select * from category";
      $result = $conn->prepare($s);
      $result->execute();
      $count = $result->rowCount();
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="feature-2">
          <img src="admin/upload/category/<?php echo $row['img']; ?>" alt="image">
          <div class="content">
            <h2><?php echo $row['Cat_name'] ?></h2>
            <a href="subcat.php?Catid=<?php echo $row['Cat_id']; ?>&Catname=<?php echo $row['Cat_name']; ?>" class="btn-see">Click To See</a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php include('include/footer.php') ?>
</body>

</html>