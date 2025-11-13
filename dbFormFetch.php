<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Update</title>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "karthika_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $roll_no = $_POST['roll_no'];
    $mark1 = $_POST['mark1'];
    $mark2 = $_POST['mark2'];
    $total = $mark1 + $mark2;

    $update = "UPDATE students SET mark1='$mark1', mark2='$mark2', total='$total' WHERE roll_no='$roll_no'";
    mysqli_query($conn, $update);

    echo "<p style='color:green;'>Marks updated successfully!</p>";
}

$selected_roll = "";
$name = "";
$mark1 = "";
$gender = "";
$roll_no = "";
$mark2 = "";
$total = "";

if (isset($_POST['roll_submit'])) {
    $selected_roll = $_POST['roll_no'];
    $query = "SELECT * FROM students WHERE roll_no='$selected_roll'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $roll_no = $row['roll_no'];
        $name = $row['name'];
        $gender = $row['gender'];
        $mark1 = $row['mark1'];
        $mark2 = $row['mark2'];
        $total = $row['total'];
    }
}
?>

<form method="post">
    <label>Select Roll Number:</label>
    <select name="roll_no" required>
        <option value="">--Select--</option>
        <?php
        $res = mysqli_query($conn, "SELECT roll_no FROM students");
        while ($r = mysqli_fetch_assoc($res)) {
            $selected = ($r['roll_no'] == $selected_roll) ? "selected" : "";
            echo "<option value='" . $r['roll_no'] . "' $selected>" . $r['roll_no'] . "</option>";
        }
        ?>
    </select>
    <input type="submit" name="roll_submit" value="Show Details">
</form>

<?php if ($selected_roll && $name): ?>
    <hr>
    <h3>Student Details</h3>
    <form method="post">
        <input type="hidden" name="roll_no" value="<?php echo $selected_roll; ?>">
        <p>Roll no: <b><?php echo $roll_no; ?></b></p>
        <p>Name: <b><?php echo htmlspecialchars($name); ?></b></p>
        <p>Gender: <b><?php echo $gender; ?></b></p>
        <p>Mark 1: <input type="number" name="mark1" value="<?php echo $mark1; ?>" required></p>
        <p>Mark 2: <input type="number" name="mark2" value="<?php echo $mark2; ?>" required></p>
        <p>Total: <b><?php echo $total; ?></b></p>
        <input type="submit" name="update" value="Update Marks">
    </form>
<?php endif; ?>

<?php mysqli_close($conn); ?>

</body>