<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GradeCard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 400px;
            background-color: #fff;
            border: 2px solid brown;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th {
            background-color: brown;
            color: white;
            padding: 12px;
            font-size: 18px;
            text-align: center;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        td:first-child {
            font-weight: bold;
            color: #333;
        }

        td:last-child {
            text-align: center;
        }

        tr:last-child td {
            border-bottom: none;
        }
    </style>
</head>
<body>
      <?php
        $name = $_POST['name'];
        $roll = $_POST['num'];
        $m1 = $_POST['mark1'];
        $m2 = $_POST['mark2'];
        $m3 = $_POST['mark3'];
        $m4 = $_POST['mark4'];
        $total = $m1 + $m2 + $m3 + $m4;
        $percentage = ($total / 200 )*100;

        if ($percentage >= 90) $grade = "A+"; 
        else if ($percentage >= 80) $grade = "A"; 
        else if ($percentage >= 70) $grade = "B";
        else if ($percentage >= 60) $grade = "C";
        else if ($percentage >= 50) $grade = "D";
        else $grade = "F";

        echo "
        <table>
            <tr><th colspan='2'>Grade Card of $name</th></tr>
            <tr><td>Roll No:</td><td>$roll</td></tr>
            <tr><td>ASE Mark:</td><td>$m1</td></tr>
            <tr><td>DS Mark:</td><td>$m2</td></tr>
            <tr><td>DFCA Mark:</td><td>$m3</td></tr>
            <tr><td>Python Mark:</td><td>$m4</td></tr>
            <tr><td>Total Marks:</td><td><b>$total</b></td></tr>
            <tr><td>Percentage:</td><td><b>$percentage%</b></td></tr>
            <tr><td>Grade:</td><td><b>$grade</b></td></tr>
        </table>
        ";
    ?>
</body>
</html>
