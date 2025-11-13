<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>🎓🧑‍🎓 Student Entry Form</h2>

    <form action="" method="POST">
        <label>Roll No:</label>
        <input type="number" name="rollno" required><br><br>

        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female<br><br>

        <label>Mark 1:</label>
        <input type="number" name="mark1" required><br><br>

        <label>Mark 2:</label>
        <input type="number" name="mark2" required><br><br>

        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
    </form>

<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "db1");
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = $_POST['rollno'];
    $name   = $_POST['name'];
    $gender = $_POST['gender'];
    $mark1  = $_POST['mark1'];
    $mark2  = $_POST['mark2'];
    $total  = $mark1 + $mark2;

    // Check if Roll No already exists
    $check = $conn->prepare("SELECT rollno FROM students WHERE rollno = ?");
    $check->bind_param("i", $rollno);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        // Roll No exists -> show alert
        echo "<script>alert('❌ Roll No $rollno already exists! Please enter a unique Roll No.');</script>";
    } else {
        // Roll No does not exist -> insert new record
        $stmt = $conn->prepare("INSERT INTO students (rollno, name, gender, mark1, mark2, total) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issiii", $rollno, $name, $gender, $mark1, $mark2, $total);
        $stmt->execute();
        $stmt->close();
    }

    $check->close();
}

// Fetch all records from database
$result = $conn->query("SELECT * FROM students ORDER BY rollno ASC");

if ($result->num_rows > 0) {
    echo "<h3>📋 Student Records</h3>";
    echo "<table>";
    echo "<tr><th>Roll No</th><th>Name</th><th>Gender</th><th>Mark 1</th><th>Mark 2</th><th>Total</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['rollno']}</td>
                <td>{$row['name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['mark1']}</td>
                <td>{$row['mark2']}</td>
                <td>{$row['total']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

$conn->close();
?>
</body>
</html>
