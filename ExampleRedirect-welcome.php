<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <?php
    if (isset($_POST['name'])) {
        $name = $_POST['name']; 
        echo "<h2>Welcome, $name!</h2>";
    } else {
        echo "<h2>No name provided. Please go back and enter your name.</h2>";
    }
    ?>
</body>
</html>
