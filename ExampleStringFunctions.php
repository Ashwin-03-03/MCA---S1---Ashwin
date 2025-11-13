<!DOCTYPE html>
<html>
<head>
    <title>PHP String Function Toolkit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 600px;
            margin: auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        input[type="submit"] {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
        }
        th {
            text-align: left;
            background: #3498db;
            color: white;
        }
        tr:hover {background-color: #f1f1f1;}
    </style>
</head>
<body>

<div class="container">
    <h2>🔤 PHP String Function Toolkit</h2>
    <form method="POST" action="">
        <label>Enter any string:</label>
        <input type="text" name="user_string" placeholder="Type something..." required>

        <input type="submit" name="submit" value="Process String">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $str = $_POST['user_string'];

        echo "<h3>Results for: <em>'$str'</em></h3>";

        echo "<table>
                <tr><th>Function</th><th>Result</th></tr>";

        // String length
        echo "<tr><td>strlen()</td><td>" . strlen($str) . "</td></tr>";

        // Word count
        echo "<tr><td>str_word_count()</td><td>" . str_word_count($str) . "</td></tr>";

        // Reverse string
        echo "<tr><td>strrev()</td><td>" . strrev($str) . "</td></tr>";

        // Uppercase
        echo "<tr><td>strtoupper()</td><td>" . strtoupper($str) . "</td></tr>";

        // Lowercase
        echo "<tr><td>strtolower()</td><td>" . strtolower($str) . "</td></tr>";

        // Uppercase first letter
        echo "<tr><td>ucfirst()</td><td>" . ucfirst($str) . "</td></tr>";

        // Uppercase first letter of each word
        echo "<tr><td>ucwords()</td><td>" . ucwords($str) . "</td></tr>";

        // MD5 hash
        echo "<tr><td>md5()</td><td>" . md5($str) . "</td></tr>";

        // SHA1 hash
        echo "<tr><td>sha1()</td><td>" . sha1($str) . "</td></tr>";

        // HTML special chars
        echo "<tr><td>htmlspecialchars()</td><td>" . htmlspecialchars($str) . "</td></tr>";

        // Trimmed string
        echo "<tr><td>trim()</td><td>" . trim($str) . "</td></tr>";

        echo "</table>";
    }
    ?>
</div>

</body>
</html>
