<?php
include("conn.php");
error_reporting(0);

// Check if a category is selected
if(isset($_POST['category']) && !empty($_POST['category'])) {
    $selectedCategory = $_POST['category'];
    
    // SQL query to retrieve data for the selected category
    $sql = "SELECT * FROM `club members` WHERE Category = '$selectedCategory'";
} else {
    // If no category is selected, retrieve all data
    $sql = "SELECT * FROM `club members`";
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><img src="<?php echo $row["companylogo"]; ?>" alt="company logo" height="100px" /></td>
    <td><?php echo $row["Companyname"]; ?></td>
    <td><?php echo $row["Category"]; ?></td>
    <td><a href="<?php echo $row["companyurl"]; ?>"><button class='click' name='click_id'>Click Here</button></a></td>
    <td>
        <a href="edit.php">Edit</a>
        <a href="delete.php">Delete</a>
    </td>
</tr>
<?php
    }
} else {
    echo "No data found";
}
?>