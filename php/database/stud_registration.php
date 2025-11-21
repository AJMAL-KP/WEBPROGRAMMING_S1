<?php
// Feedback message
$message = "";

// Run PHP only when form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Connect to database
    $conn = new mysqli("localhost", "root", "", "student");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetching form data
    $no       = $_POST['no'];
    $name     = $_POST['name'];
    $gender   = $_POST['gender'];
    $mark1    = $_POST['mark1'];
    $mark2    = $_POST['mark2'];
    $total    = $_POST['total'];
    $address  = $_POST['address'];
    $phno     = $_POST['phno'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // INSERT query
    $sql = "INSERT INTO stud 
            (no, name, gender, mark1, mark2, total, address, phno, username, password)
            VALUES 
            ('$no', '$name', '$gender', '$mark1', '$mark2', '$total', '$address', '$phno', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "Student registered successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Poppins, Arial;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 420px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-size: 14px;
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 8px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 14px;
        }

        input::placeholder {
            color: #ddd;
        }

        .btns {
            margin-top: 20px;
            display: flex;
            gap: 15px;
        }

        input[type="submit"], input[type="reset"] {
            background: rgba(0, 0, 0, 0.4);
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        input[type="submit"]:hover, 
        input[type="reset"]:hover {
            background: rgba(0, 0, 0, 0.6);
        }

        .msg {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fffa;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Student Registration</h2>

    <!-- Show message -->
    <?php if ($message != ""): ?>
        <p class="msg"><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST">

        <label>Roll No:</label>
        <input type="number" name="no" placeholder="Enter Roll Number" required>

        <label>Name:</label>
        <input type="text" name="name" placeholder="Enter Name" required>

        <label>Gender:</label>
        <input type="text" name="gender" placeholder="Enter Gender" required>

        <label>Mark 1:</label>
        <input type="number" name="mark1" placeholder="Mark 1" required>

        <label>Mark 2:</label>
        <input type="number" name="mark2" placeholder="Mark 2" required>

        <label>Total:</label>
        <input type="number" name="total" placeholder="Total" required>

        <label>Address:</label>
        <input type="text" name="address" placeholder="Enter Address" required>

        <label>Phone Number:</label>
        <input type="number" name="phno" placeholder="Enter Phone Number" required>

        <label>Username:</label>
        <input type="text" name="username" placeholder="Enter Username" required>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter Password" required>

        <div class="btns">
            <input type="submit" value="Register">
            <input type="reset" value="Clear">
        </div>

    </form>

</div>

</body>
</html>
