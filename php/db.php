<?php
$rollno = $_GET['rollno'];
$name = $_GET['name'];
$con=mysqli_connect('localhost','root','','student');
if($con)
    echo "success";
else
    echo "connection failed";

$sq = "INSERT INTO stud VALUES ($rollno,'$name')";
mysqli_query($con,$sq);


?>
