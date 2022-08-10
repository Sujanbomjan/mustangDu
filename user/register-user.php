<?php
session_start();
error_reporting(0);
try {
    include '../include/dbconn.php';
    if (isset($_POST['submit'])) {
        $images = $_FILES['profile']['name'];
        $tmp_dir = $_FILES['profile']['tmp_name'];
        $imageSize = $_FILES['profile']['size'];

        $upload_dir = 'upload/';
        $imgExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'pdf');
        $picProfile = rand(1000, 1000000) . "." . $imgExt;
        move_uploaded_file($tmp_dir, $upload_dir . $picProfile);
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conPass = $_POST['conPass'];
        $vkey = md5(time() . $username);

        $query = "SELECT username FROM users WHERE username='$username'";
        $selectStmt = $conn->prepare($query);
        $selectStmt->execute();
        $numrow = $selectStmt->rowCount();
        if ($numrow > 0) {
            header('Location: ../register.php?msg=Username Already Taken');
        } elseif (strlen($username) < 5) {
            header('Location: ../register.php?msg=Username too short');
        } elseif ($password != $conPass) {
            header('Location: ../register.php?msg=Password not matched');
        } elseif (strlen($password) < 8) {
            header('Location: ../register.php?msg=Password should be of 8 digits.');
        } elseif (!preg_match("/^[a-zA-z\s]*$/", $fullname)) {
            header('Location: ../register.php?msg=Special characters or number not allowed');
        } elseif (!preg_match("/^[0-9a-zA-Z\s]+$/", $address)) {
            header('Location: ../register.php?msg=Special Characters not allowed');
        } elseif (!preg_match("/^[0-9]*$/", $contact)) {
            header('Location: ../register.php?msg=Only number allowed ');
        } elseif (strlen($contact) != 10) {
            header('Location: ../register.php?msg=Number should be 10 digits.');
        } else {

            $sql = "INSERT INTO users(fullname,address,mobilenumber,email,vkey,username,password,image) VALUES (:fullname,:address,:contact,:email,:vkey,:username,:password,:img)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':contact', $contact);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':vkey', $vkey);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', md5($password));
            $stmt->bindParam(':img', $picProfile);
            if ($stmt->execute()) {
                $to = $email;
                $subject = "Email Verification";
                $message = "<a href='http://localhost/4thproject/user/verify.php?vkey=$vkey'>Register Account</a>";
                $headers = "From: veevekmgr9@gmail.com";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($to, $subject, $message, $headers);
                header('location:thankyou.php');
            } else {
                echo "<script>alert('Error.');document.location='../register.php'</script>";
            }
        }
    }
} catch (PDOException $e) {
}
