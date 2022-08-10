<?php
if (isset($_POST['send'])) {
    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $number = trim($_POST['number']);
    $message = trim($_POST['message']);

    $myMail = "veevekmgr9@gmail.com";
    $headers = 'From:' . $email;
    $subject = "Travel and Tour";
    $message2 = "You have received a message from " . $email . "\n\n" . $name . "\n\n" . $number . "\n\n" . $message;

    mail($myMail, $subject, $message2, $headers);
    echo '<script>alert("We have received your mail.We will contact you shortly.")</script>';
    echo '<script>window.location.href="index.php";</script>';
}
