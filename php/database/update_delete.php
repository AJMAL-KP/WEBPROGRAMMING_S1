<?php
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$message = "";
$editData = null;

// ===================== DELETE =====================
if (isset($_GET['delete'])) {
    $no = $_GET['delete'];
    $conn->query("DELETE FROM stud WHERE no='$no'");
    $message = "Record deleted successfully!";
}

// ===================== LOAD DATA FOR UPDATE =====================
if (isset($_GET['edit'])) {
    $no = $_GET['edit'];
    $result = $conn->query("SELECT * FROM stud WHERE no='$no'");
    $editData = $result->fetch_assoc();
}

// ===================== UPDATE OPERATION =====================
if (isset($_POST['update'])) {
    $no      = $_POST['no'];
    $name    = $_POST['name'];
    $address = $_POST['address'];
    $phno    = $_POST['phno'];

    $sql = "UPDATE stud SET 
                name='$name',
                address='$address',
                phno='$phno'
            WHERE no='$no'";

    if ($conn->query($sql)) {
        $message = "Record updated successfully!";
        $editData = null; // hide update section
    }
}

// ===================== FETCH ALL ROWS =====================
$rows = $conn->query("SELECT * FROM stud");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Update & Delete</title>
</head>
<body>

<h2>Student Management</h2>
<b><?php echo $message; ?></b>
<hr>

<!-- ===================== UPDATE FORM (ONLY WHEN CLICKED) ===================== -->
<?php if ($editData != null): ?>
<h3>Update Student</h3>

<form method="POST">

    <label>Roll No (Read Only):</label>
    <input type="number" name="no" value="<?php echo $editData['no']; ?>" readonly><br><br>

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $editData['name']; ?>" required><br><br>

    <label>Address:</label>
    <input type="text" name="address" value="<?php echo $editData['address']; ?>" required><br><br>

    <label>Phone:</label>
    <input type="number" name="phno" value="<?php echo $editData['phno']; ?>" required><br><br>

    <input type="submit" name="update" value="Update">
</form>

<hr>
<?php endif; ?>

<!-- ===================== DATA TABLE ===================== -->
<h3>All Students</h3>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Mark1</th>
    <th>Mark2</th>
    <th>Total</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Username</th>
    <th>Password</th>
    <th>Update</th>
    <th>Delete</th>
</tr>

<?php while ($r = $rows->fetch_assoc()): ?>
<tr>
    <td><?php echo $r['no']; ?></td>
    <td><?php echo $r['name']; ?></td>
    <td><?php echo $r['gender']; ?></td>
    <td><?php echo $r['mark1']; ?></td>
    <td><?php echo $r['mark2']; ?></td>
    <td><?php echo $r['total']; ?></td>
    <td><?php echo $r['address']; ?></td>
    <td><?php echo $r['phno']; ?></td>
    <td><?php echo $r['username']; ?></td>
    <td><?php echo $r['password']; ?></td>

    <!-- IMPORTANT: both links now point to THIS SAME FILE -->
    <td><a href="update_delete.php?edit=<?php echo $r['no']; ?>">Update</a></td>
    <td><a href="update_delete.php?delete=<?php echo $r['no']; ?>" 
           onclick="return confirm('Delete this record?');">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
