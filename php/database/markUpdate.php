<?php
$con = mysqli_connect('localhost', 'root', '', 'student');

// -------------------- SAVE MARKS --------------------
if (isset($_POST['save'])) {
    $no     = $_POST['no'];
    $mark1  = $_POST['mark1'];
    $mark2  = $_POST['mark2'];
    $total  = $mark1 + $mark2;

    $update = "UPDATE stud SET mark1='$mark1', mark2='$mark2', total='$total' WHERE no='$no'";
    mysqli_query($con, $update);

    echo "<p style='color:green;'>Marks updated successfully!</p>";
}
?>

<!-- -------------------- SEARCH FORM -------------------- -->
<form method="POST" action="markentry.php">
    <label>Select Roll No:</label>

    <select name="rollno" required>
        <option value="">--Select Roll No--</option>

        <?php
        $sql = "SELECT no FROM stud";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $selected = (isset($_POST['rollno']) && $_POST['rollno'] == $row['no']) ? "selected" : "";
            echo "<option value='".$row['no']."' $selected>".$row['no']."</option>";
        }
        ?>
    </select>

    <input type="submit" name="search" value="Search">
</form>

<hr>

<?php
// -------------------- SHOW TABLE AFTER SEARCH --------------------
if (isset($_POST['search']) && !empty($_POST['rollno'])) {

    $no = $_POST['rollno'];
    $sql = "SELECT * FROM stud WHERE no='$no'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
?>
    <form method="POST" action="markentry.php">
        <input type="hidden" name="no" value="<?php echo $row['no']; ?>">

        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Mark 1</th>
                <th>Mark 2</th>
                <th>Total</th>
            </tr>

            <tr>
                <td><?php echo $row['no']; ?></td>
                <td><?php echo $row['name']; ?></td>

                <td><input type="number" name="mark1" value="<?php echo $row['mark1']; ?>"></td>
                <td><input type="number" name="mark2" value="<?php echo $row['mark2']; ?>"></td>

                <td><?php echo $row['total']; ?></td>
            </tr>
        </table>

        <br>
        <input type="submit" name="save" value="Update">
        <input type="reset" value="Reset">
    </form>

<?php
    }
}
?>
