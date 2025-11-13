<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Form</title>
</head>
<body>
    <form action="" method="POST">
        <h2>Student Entry</h2>
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Mark:</label>
        <input type="number" name="mark" required><br><br>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "db1");
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $mark = $_POST['mark'];

    $sql = "INSERT INTO tb1 (name, mark) VALUES ('$name', $mark)";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>✅ Record Saved Successfully!</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Mark: $mark</p>";
    } else {
        echo "❌ Error: " . $conn->error;
    }

    $conn->close();
}    // Escape special characters to avoid SQL errors
   // $name = $conn->real_escape_string($name);

    // Use direct query (no placeholders)
?>
</body>
</html>

