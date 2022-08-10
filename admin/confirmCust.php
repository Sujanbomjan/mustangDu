<?php
include('../include/dbconn.php');
$id = $_GET['id'];
$confirm = $_GET['confirm'];
?>
<?php
session_start();
require_once('include/auth.php');
?>

<?php
if ($confirm == 0) {
    $sql = "UPDATE customize SET confirm=1 WHERE id =" . $id;
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        header('Location: viewCust.php?success');
    } else {
        echo "error";
    }
} else {
    header('Location: viewCust.php?error');
}
