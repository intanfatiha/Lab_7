<?php
include 'session.php';
include 'Database.php';
include 'User.php';


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['matric'])) {
        $matric = $_GET['matric'];

        $database = new Database();
        $db = $database->getConnection();

        $user = new User($db);
        $userDetails = $user->getUser($matric);

        $db->close();
        
        if ($userDetails) {
            // Render the HTML form only if user details are found
            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Update User</title>

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
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            border: none;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            /* display: block; */
            margin-bottom: 2px;
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
                <h1 style="padding: 50px;">UPDATE</h1>
                <form action="update.php" method="post">
                <fieldset>
                    <label for="matric">Matric: </label> <br>
                    <input type="text" name="matric" value="<?php echo $userDetails['matric']; ?>"> <br>
                    <label for="name">Name: </label> <br>
                    <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>"> <br>
                    <label for="role">Access Level: </label><br>
                    <select style="width: calc(100% - 20px);padding: 8px 10px; border: 1px solid #ddd;
                    border-radius: 4px;font-size: 16px;" name="role" id="role" required> <br>
                        <option value="">Please select</option>
                        <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer') echo "selected"; ?>>Lecturer</option>
                        <option value="student" <?php if ($userDetails['role'] == 'student') echo "selected"; ?>>Student</option>
                    </select><br>
                    <button type="submit" name="submit" value="Submit">Update</button>
                    <br><br><a href="display.php">Cancel</a> 

                </form>
                </fieldset>
            </body>
            </html>

            <?php
        } else {
            echo "No user found with the given matric number.";
        }
    } else {
        echo "Matric number is missing.";
    }
} else {
    echo "Invalid request method.";
}
?>
