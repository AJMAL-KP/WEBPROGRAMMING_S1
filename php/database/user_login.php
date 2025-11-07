<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: white;
}
#container {
    width: 350px;
    background-color: green;
    padding: 20px;
    border-radius: 8px;
    color: white;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 4px;
}
input[type="submit"] {
    padding: 8px;
    background-color: white;
    color: green;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>

<div id="container">
    <form action="user_login.php" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username">
    <label for="pswd">Password</label>
    <input type="password" name="pswd"> <br> <br>
    <input type="submit" name="submit">
    </form>
    <div id="error">
        <p id="ms"></p>
    </div>
</div>




<?php
$con=mysqli_connect('localhost','root','','student');
if (isset($_POST['submit']) ){
$user=$_POST['username'];
$pswd=$_POST['pswd'];
 $sql = "SELECT * FROM admin";

        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if($row['username']!=$user)
            {
                echo "<script>document.getElementById('ms').innerHTML='Invalid User';
                </script>";
            }
            else if($row['password']!=$pswd){
                echo "<script>document.getElementById('ms').innerHTML='Invalid passwrd';
                </script>";
            
            }
            else{
                  header("Location: iframe.html");
    exit();
            }}

     $sql2 = "SELECT * FROM stud WHERE username = '$user' AND password = '$pswd'";
        $result2 = mysqli_query($con, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            header("Location: iframe.html");
            exit();
        } else {
            echo "<script>document.getElementById('ms').innerHTML='Invalid Credentials';</script>";
        }
}

?>