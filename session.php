<?php
session_start();

if (!isset($_SESSION['matric'])) {
    // Redirect to login page if session is not set
    header("Location: login.php");
    exit;
}
?>