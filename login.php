<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        fieldset {
            background-color: white;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            border: none;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #1976d2;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="" method="post">
        <fieldset>
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <br>
            <button type="submit" name="submit" value="Submit">Login</button>
        </fieldset>
        <p class="error-message">
            <?php
            session_start();
            include 'Database.php';
            include 'User.php';
            
            if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
                $database = new Database();
                $db = $database->getConnection();

                $matric = $db->real_escape_string($_POST['matric']);
                $password = $db->real_escape_string($_POST['password']);

                if (!empty($matric) && !empty($password)) {
                    $user = new User($db);
                    $userDetails = $user->getUser($matric);

                    if ($userDetails && password_verify($password, $userDetails['password'])) {
                        $_SESSION['matric'] = $userDetails['matric'];
                        $_SESSION['name'] = $userDetails['name'];
                        $_SESSION['role'] = $userDetails['role'];
                        echo '<script>alert("Login Successful"); window.location.href = "display.php";</script>';
                    } else {
                        echo 'Invalid username or password. Try <a href="login.php">login</a> again.';
                    }
                } else {
                    echo ' <a href="register_form.php">Register</a> here if you have not.';
                }
                $db->close();
            }
            ?>
        </p>
    </form>
</body>
</html>
