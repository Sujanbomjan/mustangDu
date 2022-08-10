<?php
include('include/dbconn.php');
$id = $_GET['id'];
$confirm = $_GET['confirm'];
?>
<?php
session_start();
?>
<?php
if ($confirm == 0) {
    $sql = "UPDATE customize SET  confirm=1 WHERE id =" . $id;
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        header('Location: seePlan.php?customizedId=' .  $id . ' &success');
    } else {
        echo "error";
    }
} else {
    header('Location: seePlan.php?customizedId=' .  $id);
}
