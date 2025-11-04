<style>
    html, body {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #fafafa;
        display: flex;
        justify-content: center;   
        align-items: center;       
    }

    form {
        border: 1px solid #000;    
        padding: 20px;
        width: 320px;
        border-radius: 5px;
        background-color: #fff;
        box-sizing: border-box;
    }

    select, input[type="number"], button, input[type="submit"], input[type="reset"] {
        display: block;
        width: 100%;
        margin-bottom: 12px;
        padding: 8px;
        font-size: 15px;
        border: 1px solid #000;  
        border-radius: 3px;
        box-sizing: border-box;
    }

    button, input[type="submit"], input[type="reset"] {
        background-color: #d3d3d3;  
        color: #000;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #000;
        transition: background-color 0.3s;
    }

    button:hover, input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #bfbfbf;  
    }

    label, p {
        font-weight: bold;
    }
</style>



<form action="rollno.php" method="POST">
    ROLL NO:
    <select name="rollno">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'student');
        $sql = "SELECT no FROM stud";
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['no'] == $_POST['rollno']) {
     echo "<option value='" . $row['no'] . "' selected>" . $row['no'] . "</option>";
} else {
    echo "<option value='" . $row['no'] . "'>" . $row['no'] . "</option>";
}

        }
        ?>
    </select>

   
    <button type="submit" name="search">SEARCH</button>
    <br><br>

    <?php
    if (isset($_POST['search']) && !empty($_POST['rollno'])) {
        $rollno = $_POST['rollno'];

        $query = "SELECT name, mark1, mark2 FROM stud WHERE no='$rollno'";
        $resultdata = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($resultdata);

        echo "NAME: " . $row['name'];
        echo "<br><br>";

        echo "<input type='number' name='m1' value='" . $row['mark1'] . "'>";
        echo "<br><br>";

        echo "<input type='number' name='m2' value='" . $row['mark2'] . "'>";
        echo "<br><br>";
    

        echo "<input type='submit' value='UPDATE'  name='update'>";
        echo "<input type='reset' value='RESET'  name='reset'>";


  

    }

      if (isset($_POST['update']) && !empty($_POST['m1']) && !empty($_POST['m2'])) {
        $rollno = $_POST['rollno'];
        $mark1 = trim($_POST['m1']);
        $mark2 = trim($_POST['m2']);

        $sq3="UPDATE stud SET mark1=$mark1, mark2=$mark2 WHERE no=$rollno";
        mysqli_query($con,$sq3);
    }
  
    ?>
    
</form>
