<?php
// Connect to Database
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$student = null;

// Fetch roll numbers for dropdown
$rolls = $conn->query("SELECT no FROM stud");

// If search button clicked
if (isset($_POST['search'])) {
    $roll = $_POST['rollno'];
    $result = $conn->query("SELECT * FROM stud WHERE no='$roll'");
    $student = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Progress Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        h2 {
            color: #333;
        }

        /* Dropdown Form */
        .search-box {
            background: white;
            padding: 20px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0px 0px 8px #ccc;
            margin-bottom: 30px;
        }

        select, input[type="submit"] {
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            font-size: 15px;
        }

        input[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        /* Progress Card Styling */
        .card {
            width: 500px;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 12px #bbb;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .details, .marks {
            width: 100%;
            border-collapse: collapse;
        }

        .details td, .marks td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .section-title {
            font-size: 18px;
            margin-top: 20px;
            color: #444;
        }
    </style>
</head>
<body>

<h2>Student Progress Card</h2>

<!-- ================= ROLLNO SEARCH FORM ================= -->
<div class="search-box">
    <form method="POST">

        <label>Select Roll No:</label>
        <select name="rollno" required>
            <option value="">-- Select Roll No --</option>

            <?php while ($r = $rolls->fetch_assoc()): ?>
                <option value="<?php echo $r['no']; ?>">
                    <?php echo $r['no']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <input type="submit" name="search" value="Search">
    </form>
</div>

<!-- ================= DISPLAY PROGRESS CARD ================= -->
<?php if ($student != null): ?>
<div class="card">

    <div class="header">
        <h2>Progress Card</h2>
        <h3><?php echo $student['name']; ?></h3>
        <p>Roll No: <b><?php echo $student['no']; ?></b></p>
    </div>

    <div class="section-title">Student Details</div>
    <table class="details">
        <tr><td><b>Gender</b></td><td><?php echo $student['gender']; ?></td></tr>
        <tr><td><b>Address</b></td><td><?php echo $student['address']; ?></td></tr>
        <tr><td><b>Phone</b></td><td><?php echo $student['phno']; ?></td></tr>
        <tr><td><b>Username</b></td><td><?php echo $student['username']; ?></td></tr>
    </table>

    <div class="section-title">Marks</div>
    <table class="marks">
        <tr><td><b>Mark 1</b></td><td><?php echo $student['mark1']; ?></td></tr>
        <tr><td><b>Mark 2</b></td><td><?php echo $student['mark2']; ?></td></tr>
        <tr><td><b>Total</b></td><td><b><?php echo $student['total']; ?></b></td></tr>
    </table>
</div>
<?php endif; ?>

</body>
</html>
