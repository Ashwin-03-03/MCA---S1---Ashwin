<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Report</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef6ff;
            padding: 40px;
        }
        .report-card {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            width: 450px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2 {
            color: #2e86c1;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #2e86c1;
            color: white;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="report-card">
    <h2>Student Report Card</h2>

    <?php
        // Collect data from form
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);
        $math = (int)$_POST['math'];
        $science = (int)$_POST['science'];
        $english = (int)$_POST['english'];

        // Calculate total and average
        $total = $math + $science + $english;
        $average = $total / 3;
    ?>

    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Age:</strong> <?php echo $age; ?></p>

    <table>
        <tr>
            <th>Subject</th>
            <th>Marks</th>
        </tr>
        <tr><td>Math</td><td><?php echo $math; ?></td></tr>
        <tr><td>Science</td><td><?php echo $science; ?></td></tr>
        <tr><td>English</td><td><?php echo $english; ?></td></tr>
        <tr class="total"><td>Total</td><td><?php echo $total; ?></td></tr>
        <tr class="total"><td>Average</td><td><?php echo number_format($average, 2); ?></td></tr>
    </table>

</div>

</body>
</html>
