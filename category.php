<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="5,http://localhost/mini/company/company.php">
</head>
<body>
    <form method="post" action="">
    <table>
        <label for="category">Category:</label><input type="text" name="category" id="category" placeholder="Enter your category" required autocomplete="off" />
        <button type="submit" name="submit" value="submit" id="submit">SUBMIT</button>
        <?php
        session_start();
        include("conn.php");
        error_reporting(0);
        
        if (isset($_POST['submit'])){
        $category = $_POST['category'];
        $sql = "INSERT INTO category VALUES('','$category')";
        $result = mysqli_query($conn, $sql);
        
        if($result){
            echo"category added";

        }
    
        else{
            echo "failed to add your category";
        }
        }
        ?>
    </table>
    </body>
</html>