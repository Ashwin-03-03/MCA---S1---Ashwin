<!DOCTYPE html>
<html>
<head>
    <title>Dropdown 1–100 Example</title>
</head>
<body>

<form method="POST" action="">
    <label for="number">Select a number:</label>
    <select name="number" id="number">
        <?php
        for ($i = 1; $i <= 100; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $selectedNumber = $_POST['number']; 
    echo "<script>alert('You selected: $selectedNumber');</script>"; 
}
?>

</body>
</html>
