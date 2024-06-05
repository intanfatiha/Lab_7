<?php
include 'Database.php';
include 'User.php';

if($_SERVER["REQUEST_METHOD"]=="GET")
{
    $matric = $_GET['matric'];

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->deleteUser($matric);

    echo '<script>alert("Data is successfully deleted!") 
          window.location.href = "display.php";</script>'; 

    $db->close();
}