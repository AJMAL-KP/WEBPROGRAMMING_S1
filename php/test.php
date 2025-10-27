<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>
    <select>
        <?php
        for ($i=0;$i<10;$i++)
            echo "<option value=".$i.">".$i."</option>";
        ?>
        </select>

    
</body>
</html>