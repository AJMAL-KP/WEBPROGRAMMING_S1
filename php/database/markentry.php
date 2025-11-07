<form action="markentry.php" method="POST">
    <label for="rollno">ROllNo:</label>
    <select name="rollno" id="rollno">
    <?php
    $con=mysqli_connect('localhost','root','','student');
    $sql="SELECT no from stud";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='" . $row['no'] . "'>" . $row['no'] . "</option>";

        }
    }
        
    ?>
    </select>
    <input type="submit" value="search">
</form>
<?php
if(isset($_POST['name'])){

}
?>

/*
<?php
$con = mysqli_connect('localhost', 'root', '', 'student');

// Handle the second form (saving marks)
if (isset($_POST['save'])) {
    $rollno = $_POST['rollno'];
    $name   = $_POST['name'];
    $mark1  = $_POST['mark1'];
    $mark2  = $_POST['mark2'];
    $total  = $_POST['total'];

    // Example insert query (adjust table/column names as per your DB)
    $sql = "INSERT INTO marks (rollno, name, mark1, mark2, total) VALUES ('$rollno', '$name', '$mark1', '$mark2', '$total')";
    if (mysqli_query($con, $sql)) {
        echo "<p style='color:green;'>Record saved successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error saving record: " . mysqli_error($con) . "</p>";
    }
}

// Handle the first form (search by roll number)
?>
<form action="markentry.php" method="POST">
    <label for="rollno">Roll No:</label>
    <select name="rollno" id="rollno" required>
        <option value="">--Select Roll No--</option>
        <?php
        $sql = "SELECT no FROM stud";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Keep the selected rollno after submission
                $selected = (isset($_POST['rollno']) && $_POST['rollno'] == $row['no']) ? "selected" : "";
                echo "<option value='" . $row['no'] . "' $selected>" . $row['no'] . "</option>";
            }
        }
        ?>
    </select>
    <input type="submit" name="search" value="Search">
</form>

<?php
// If user clicked search, show second form
if (isset($_POST['search']) && !empty($_POST['rollno'])) {
    $rollno = $_POST['rollno'];

    // Fetch name from student table
    $sql = "SELECT name FROM stud WHERE no = '$rollno'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    ?>

    <hr>
    <form action="markentry.php" method="POST">
        <input type="hidden" name="rollno" value="<?php echo $rollno; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" readonly><br><br>

        <label for="mark1">Mark 1:</label>
        <input type="number" name="mark1" required><br><br>

        <label for="mark2">Mark 2:</label>
        <input type="number" name="mark2" required><br><br>

        <label for="total">Total:</label>
        <input type="number" name="total" required><br><br>

        <input type="submit" name="save" value="Save">
        <input type="reset" value="Reset">
    </form>
    <?php
}
?>

*/