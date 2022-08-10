<?php

include('../include/dbconn.php');
$id = $_GET['id'];
$sql = "DELETE FROM enquiry WHERE Enquiryid =" . $id;
$stmt = $conn->prepare($sql);
$sql1 = "ALTER TABLE enquiry AUTO_INCREMENT = 1";
$stmt1 = $conn->prepare($sql1);

$stmt1->execute();
if ($stmt->execute()) {
    echo "<script>alert('Deleted');document.location='viewCust.php';</script>";
}
