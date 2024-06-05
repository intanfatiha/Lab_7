<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        fieldset {
            background-color: white;
            width: 40%;
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
    <h1 style="text-align:center;">USER REGISTER</h1>
    <form action="insert.php" method="post">
    <fieldset>
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required><br>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="role">Role:</label>
        <select style="width: calc(100% - 20px);padding: 8px 10px; border: 1px solid #ddd;
                    border-radius: 4px;font-size: 16px;"name="role" id="role" required>
            <option value="">Please select</option>
            <option value="lecturer">Lecturer</option>
            <option value="student">Student</option>
        </select><br>
        <button type="submit" name="submit" value="Register">Register</button>

    </form>
    </fieldset>
</body>

</html>