ROLL NO:
<select name="rollno">

<?php
$con=mysqli_connect('localhost','root','','student');
if($con)
    echo "success";
else
    echo "connection failed";

$sql = "SELECT no FROM stud";
$result=mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['no'] . "'>" . $row['no'] . "</option>";
}


?>
</select>
