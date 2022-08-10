<?php
include('../include/dbconn.php');
if (isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $sql = "SELECT verified,vkey FROM users WHERE verified = 0 AND vkey = :vkey LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':vkey', $vkey);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
        $update = $conn->prepare("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
        $update->execute();
        echo "<script>alert('Thank you for registration!');document.location='../login.php'</script>";
    } else {
        echo "<script>alert('This account is invalid or already Verified!');document.location='../login.php'</script>";
    }
}
