<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category table</title>
</head>
<body>
    <table>
        <tr>
            <th>Category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        include("conn.php");
        error_reporting(0);
        $sql ="SELECT * FROM category ORDER BY category ASC";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row["category"]; ?></td>
                    <td><a href="edit.php">Edit</td></a>
                    <td><a href="delete.php">delete</td></a>
                </tr>
                <?php
            }
        }
        ?>


</body>
</html>