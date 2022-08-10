<?php

if (!isset($_SESSION['username'])) {
    header('admin-login.php');
}
