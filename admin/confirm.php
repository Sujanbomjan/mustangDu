<?php
include('../include/dbconn.php');
$id = $_GET['id'];
$confirm = $_GET['confirm'];
if ($confirm == 0) {
    $sql = "UPDATE booking SET confirm=1 WHERE id =" . $id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header('Location: viewBook.php?confirm=1');
} else {
    header('Location: viewBook.php');
}
