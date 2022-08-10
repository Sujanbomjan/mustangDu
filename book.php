<?php
include('include/dbconn.php');
error_reporting(0);
session_start();

if (isset($_POST['send-book'])) {
    $username = $_SESSION["username"];
    $packName = $_GET['packname'];
    $id = $_GET['id'];
    if (isset($username)) {
        $number = $_POST['people'];
        $date = $_POST['date'];
        $packname = $_GET['packname'];
        $sql = "INSERT INTO booking(username,noofpeople,date,packagename) VALUES(:username,:number,:date,:packname)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':packname', $packname);
        if ($stmt->execute()) {
            header('Location: package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msg=We will Contact you shortly!');
        } else {
            header('Location: package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msgError=Error');
        }
    } else {
        header('Location: package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msgError=Please Login First');
    }
}
?>

<?php
if (isset($_POST['send-cust'])) {
    $username = $_SESSION["username"];
    $packName = $_GET['packname'];
    $id = $_GET['id'];
    if (isset($username)) {
        $people = $_POST['people'];
        $day = $_POST['day'];
        $hotel = $_POST['hotel'];
        $date = $_POST['date'];
        $packname = $_GET['packname'];
        $activityall = "";
        $placesall = "";
        foreach ($_POST['activity'] as $activity) {
            $activityall .= $activity . ", ";
        }
        foreach ($_POST['places'] as $places) {
            $placesall .= $places . ", ";
        }
        if ($day > 10) {
            header('Location: package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msgError=Only Valid till 10 days.');
        } else {
            //echo $hotel;
            $sql1 = "INSERT INTO customize(packagename,username,people,day,date,hotel,activity,places,totalPrice) VALUES(:packname,:username,:people,:day,:date,:hotel,:activity,:places,0)";
            $stmt = $conn->prepare($sql1);
            $stmt->bindParam(':packname', $packname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':people', $people);
            $stmt->bindParam(':day', $day);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':hotel', $hotel);
            $stmt->bindParam(':activity', $activityall);
            $stmt->bindParam(':places', $placesall);
            if ($stmt->execute()) {
                header('Location: package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msg=We will Contact you shortly!!');
            } else {
                header('Location: package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msgError=Error');
            }
        }
    } else {
        header('Location: package.php?subcatid=' . $id . '&subcatname=' . $packName . '&msgError=Please Login First');
    }
}
?>
