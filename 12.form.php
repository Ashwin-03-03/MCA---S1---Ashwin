<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            padding: 30px;
        }
        h2 {
            color: #003366;
        }
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 12px;
            width: 400px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
        }
        input[type="submit"],
        input[type="reset"] {
            padding: 10px 15px;
            margin-top: 15px;
            cursor: pointer;
            border: none;
            border-radius: 6px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        input[type="reset"] {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

    <h2>Enter Student Details</h2>

    <form action="12.report.php" method="post" target="_blank">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="math">Math Marks:</label>
        <input type="number" id="math" name="math" required>

        <label for="science">Science Marks:</label>
        <input type="number" id="science" name="science" required>

        <label for="english">English Marks:</label>
        <input type="number" id="english" name="english" required>

        <br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>

</body>
</html>
