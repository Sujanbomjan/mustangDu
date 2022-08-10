<?php
session_start();
include('../include/dbconn.php');
if (isset($_POST['sendenquiry'])) {
    $name = $_SESSION["username"];
    $packName = $_GET['packname'];
    $id = $_GET['id'];
    if (isset($name)) {
        $packname = $_GET['packname'];
        $subject = $_POST['subject'];
        $message = $_POST['enquiry'];
        $sql = "INSERT INTO enquiry(fullname,subject,packname,Message) VALUES (:name, :subject,:packname,:message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':packname', $packname);
        if ($stmt->execute()) {
            header('Location: ../package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msg=We will Contact you shortly!!');
        }
    } else {
        echo "<script>alert('Login or register first!');document.location='../login.php'</script>";
    }
}
