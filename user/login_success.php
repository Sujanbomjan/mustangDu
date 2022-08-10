<?php
//login_success.php  
session_start();
if (isset($_SESSION["username"])) {

     header("location:../user-profile.php");
} else {
     header("location:../login.php");
}
