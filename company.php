<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="5,http://localhost/mini/company/company.php">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
    <style>
        .container {
            justify-content: center;
            border: 1px solid #ccc;
            width: 700px;
            border-radius: 5px;
        }

        form {
            box-sizing: border-box;
            margin: 10px;
            padding: 30px;
        }

        h1 {
            padding: 5px;
            letter-spacing: 1px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }

        label {
            float: left;
            width: 30%;
            padding: 6px;
            margin-top: 6px;

        }

        input[type="file"],
        input[type="text"],
        input[type="url"] {
            float: right;
            width: 60%;
            border-radius: 4px;
            padding: 5px;
            border: 1px solid #ccc;
            margin: 5px;
         }
         select[id="category"]{
            float: right;
            width: 60%;
            border-radius: 4px;
            padding: 5px;
            border: 1px solid #ccc;
            margin: 5px;
         }
        

        button {
            padding: 9px;
            border-radius: 9px;
            width: 20%;
            display: flexbox;
            margin-top: 20px;
            cursor: pointer;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    
        <form class="category" method="post" action="category.php">
        <button><a href="category.php">ADD Category</button></a>
        </form>
    <h1>Company Details</h1>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <label>COMPANY LOGO:</label> <input type="file" name="companylogo" id="logo" placeholder="Company Logo"
                required capture autocomplete="off" /><br><br>
            <label>COMPANY NAME: </label><input type="text" name="Companyname" id="name" placeholder="Company Name"
                required autocomplete="none" /><br><br>
            <label> CATEGORY: </label><select name="Category" id="category" required autocomplete="off" method="post"> <br><br>
                <option>Select Company Category</option>
                <option>Chemicals</option>
                <option>Consulting Services</option>
                <option>Engineering</option>
                <option>Food Industries</option>
                <option>Logistics Sevices</option>
                <option>Manufacturing</option>
                <option>machinery</option>
                <option>Pharmaceuticals</option>
                <option>Plastic Industry</option>
                <option>Professionals</option>
                <option>Service Provider</option>
                <option>Trading</option>
                <option>Others</option>
                
</select>
               
            <label>COMPANY URL:</label> <input type="url" name="companyurl" id="url" placeholder="Company Url" required
                autocomplete="off" /><br><br>
            <button type="submit" value="submit" name="submit">SUBMIT</button>
            <button><a href="Companytable.php">Show</a></button>
        </form>
    </div>
</body>

</html>
<?php
session_start();
error_reporting(0);
include("conn.php");

if (isset($_POST["submit"])) {

    $company_logo = $_FILES['companylogo']['name'];
    $temp_logo = $_FILES['companylogo']['tmp_name'];
    $company_name = $_POST['Companyname'];
    $category = $_POST['Category'];
    $company_website = $_POST['companyurl'];
    
    $upload_directory = $_SERVER['DOCUMENT_ROOT'] . "/mini/company/uploads/";
    move_uploaded_file($temp_logo, $upload_directory . $company_logo);
    $upload_path = $upload_directory . $company_logo;

    $allowed_width = 200;
    $allowed_height = 200;
    list($width, $height) = getimagesize($company_logo);
    if($width > $allowed_width || $height > $allowed_height) {
        echo '<script>';
        echo 'alert("Image dimensions exceed the allowed size")';
        echo '</script>';
        exit;
    }

    $sql = "INSERT INTO `club members` VALUES('','$company_logo','$company_name','$category','$company_website')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>';
        echo 'alert("Your data added successfully")';
        echo '</script>';
    } else {
        echo "FAILED TO ADD YOUR COMPANY DETAILS";
    }
} 


?>