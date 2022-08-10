<?php
//login_success.php  
session_start();

if (isset($_SESSION["adminname"])) {

    header("location:dashboard.php");
} else {
    header("location:admin-login.php");
}
