<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f6fc;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 25px;
        }

        form {
            background-color: #fff;
            width: 400px;
            margin: 40px auto;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 0px;
            color: #444;
        }

        input[type="text"],
        input[type="number"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 8px;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        input[type="reset"] {
            background-color: #6c757d;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="reset"]:hover {
            background-color: #5a6268;
        }

        .message {
            text-align: center;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <h2>Student Registration Form</h2>

    <?php
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "karthika_db");

    if (!$conn) {
        die("<pConnection failed: " . mysqli_connect_error() . "</p>");
    }

    // If form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $roll_no = $_POST['roll'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['mark1'];      // (mark1 field used as phone input)
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['con_pass'];

        if ($password !== $confirm_password) {
            echo "<p class='message' style='color:red;'>Passwords do not match!</p>";
        } else {
            // Encrypt password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Create table if not exists
            $create_table = "CREATE TABLE IF NOT EXISTS student_details (
                roll_no INT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                address VARCHAR(255),
                phone BIGINT,
                username VARCHAR(100) UNIQUE,
                password VARCHAR(255)
            )";
            mysqli_query($conn, $create_table);

            // Insert data
            $insert = "INSERT INTO student_details (roll_no, name, address, phone, username, password)
                       VALUES ('$roll_no', '$name', '$address', '$phone', '$username', '$hashed_password')";

            if (mysqli_query($conn, $insert)) {
                echo "<p class='message' style='color:green;'>Record saved successfully!</p>";
            } else {
                echo "<p class='message' style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    }

    mysqli_close($conn);
    ?>

    <form action="" method="post">
        <label>Roll No:</label>
        <input type="number" name="roll" required>

        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Address:</label>
        <input type="text" name="address">

        <label>Ph No:</label>
        <input type="number" name="mark1" required>

        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <label>Confirm Password:</label>
        <input type="password" name="con_pass" required>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
