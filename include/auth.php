<?php

if (!isset($_SESSION['username'])) {
    header('./login.php');
}
