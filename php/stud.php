<?php
$con=mysqli_connect('localhost','root','','student');
/*if($con)
    echo "success";
else
    echo "connection failed";
*/
$rollno=$_POST['rollno'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$mark1=$_POST['mark1'];
$mark2=$_POST['mark2'];

$total=$mark1+$mark2;

$qu1="SELECT * FROM stud WHERE no=$rollno";
$result=mysqli_query($con,$qu1);
if(mysqli_num_rows($result)>0){
    echo "<script>alert('Roll no exists');
    document.location='stud.html';
    </script>";
}
else{
    
$qu="INSERT INTO stud VALUES($rollno,'$name','$gender',$mark1,$mark2,$total)";
$success=mysqli_query($con,$qu);

if($success){
    echo "<script>alert('Successfully saved');
    document.location='stud.html';
    </script>";
}
else{
    echo "<script>alert('Operation failed');
    document.location='stud.html';
    </script>";
}


}
