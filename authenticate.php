<?php

include 'Database.php';
include 'User.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD']=='POST'))
{
    $database = new Database();
    $db = $database -> getConnection();

    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    if (!empty($matric) && !empty($password))
    {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        if ($userDetails && password_verify($password, $userDetails['password']))
        {
            echo '<script>alert("Login Successful")</script>'; 

        }
        else
        {
            echo 'Invalid username or password, try '; echo "<a href="register_form.php">login</a>";
        }
    }
    else
    {
        echo 'Please fill in all required fields.';
    }
}