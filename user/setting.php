<?php
session_start();
include('../include/dbconn.php');
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $fullname = $row['fullname'];
    $real_address = $row['address'];
    $real_contact = $row['mobilenumber'];
    $real_email = $row['email'];
    $real_password = $row['password'];
}

if (isset($_POST['change-name'])) {
    $username = $_SESSION['username'];
    $name = $_POST['fullname'];
    if (empty($name)) {
        echo "<script>alert('Field is Empty');document.location='../user-setting.php';</script>";
    } elseif ($name == $fullname) {
        echo "<script>alert('Fullname is as previous');document.location='../user-setting.php';</script>";
    } elseif (!preg_match("/^[a-zA-z\s]*$/", $name)) {
        echo "<script>alert('Alphabets are only allowed!');document.location='../user-setting.php';</script>";
    } else {
        $sql1 = "UPDATE users SET fullname = :name WHERE username = :username ";
        $result = $conn->prepare($sql1);
        $result->bindParam(':name', $name);
        $result->bindParam(':username', $username);
        $result->execute();

        if ($result->execute()) {

            echo "<script>alert('Fullname Changed');document.location='../user-setting.php';</script>";
        } else {
            echo 'error';
        }
    }
}
if (isset($_POST['change-address'])) {
    $username = $_SESSION['username'];
    $address = $_POST['address'];

    if (empty($address)) {
        echo "<script>alert('Field is Empty');document.location='../user-setting.php';</script>";
    } elseif ($address == $real_address) {
        echo "<script>alert('Address is as previous');document.location='../user-setting.php';</script>";
    } elseif (!preg_match("/^[0-9a-zA-Z\s]+$/", $address)) {
        echo "<script>alert('Alphabets and Number are only allowed!');document.location='../user-setting.php';</script>";
    } else {
        $sql1 = "UPDATE users SET address = :address WHERE username = :username ";
        $result = $conn->prepare($sql1);
        $result->bindParam(':address', $address);
        $result->bindParam(':username', $username);
        $result->execute();

        if ($result->execute()) {
            echo "<script>alert('Address Changed');document.location='../user-setting.php';</script>";
        } else {
            echo 'error';
        }
    }
}
if (isset($_POST['change-contact'])) {
    $username = $_SESSION['username'];
    $contact = $_POST['contact'];
    $length = strlen($contact);

    if (empty($contact)) {
        echo "<script>alert('Field is Empty');document.location='../user-setting.php';</script>";
    } elseif ($contact == $real_contact) {
        echo "<script>alert('Contact is as previous');document.location='../user-setting.php';</script>";
    } elseif (!preg_match("/^[0-9]*$/", $contact)) {
        echo "<script>alert('Numeric value is only supported');document.location='../user-setting.php';</script>";
    } elseif ($length != 10) {
        echo "<script>alert('Only 10 character valid');document.location='../user-setting.php';</script>";
    } else {
        $sql1 = "UPDATE users SET mobilenumber = :contact WHERE username = :username ";
        $result = $conn->prepare($sql1);
        $result->bindParam(':contact', $contact);
        $result->bindParam(':username', $username);
        $result->execute();

        if ($result->execute()) {
            echo "<script>alert('Contact Changed');document.location='../user-setting.php';</script>";
        } else {
            echo 'error';
        }
    }
}
if (isset($_POST['change-pw'])) {
    $username = $_SESSION['username'];
    $currentpw = md5($_POST['current-pw']);
    $newpw = md5($_POST['new-pw']);
    $conpw = md5($_POST['con-pw']);
    if (empty($currentpw) || empty($newpw) || empty($conpw)) {
        echo "<script>alert('Field is Empty');document.location='../user-setting.php';</script>";
    } elseif ($currentpw != $real_password || $newpw != $conpw) {
        echo "<script>alert('Password doesnot match');document.location='../user-setting.php';</script>";
    } else {
        $sql1 = "UPDATE users SET password = :password WHERE username = :username ";
        $result = $conn->prepare($sql1);
        $result->bindParam(':password', $newpw);
        $result->bindParam(':username', $username);
        $result->execute();
        if ($result->execute()) {
            echo "<script>alert('Password Changed');document.location='../user-setting.php';</script>";
        } else {
            echo 'error';
        }
    }
}

if (isset($_POST['delete_acc'])) {
    $username = $_SESSION["username"];
    $sql = "DELETE FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $result = $stmt->execute();
    if ($result) {
        echo "<script>alert('Account Deleted Successfully');document.location='../login.php';</script>";
        session_destroy();
    }
}
