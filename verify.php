<?php
    session_start();

    if(!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
        header('location: login.php');
    }
    else {
        $_SESSION['emailVerified'] = true;
        header('location: welcome.php');
    }
?>
