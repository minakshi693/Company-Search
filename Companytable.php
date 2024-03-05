<?php
            include("conn.php");
            error_reporting(0);
            ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }

        .search-container {
            position: fixed;
            top: 102px;
            width: 100%;
            background-color: #f2f2f2;
            padding: 9px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .table-container {
            margin-top: 200px;
            overflow-y: auto;
            width: 80%;
            margin: 180px auto 0;
            max-height: calc(100vh - 230px);
        }


        form {
            float: right;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            margin: 10px;
           

        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            border: 1px solid #ccc;
        }

        th {
            background-color: #0F61A7;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        td img {
            max-width: 100px;
            max-height: 100px;
        }

        select,
        input[type="text"] {
            padding: 8px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #0F61A7;
            border-radius: 20px;
            border-radius: 5px solid black;
            height: 25px;
            width: 90px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        img {
            float: top;

        }

        .logo-container {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #ffffff;
            padding: 10px;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            margin: auto;
            max-width: 100%;
            text-align: left;
        }

        .logo img {
            max-width: 260px;
            height: auto;
        }
       input[type="button"]{
        float: left;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 10px;
        cursor: pointer;

       }
    </style>
</head>

<body>

    <div class="logo-container">
        <div class="logo">
            <img src="mems.png" alt="logo" width="260px" height="92px">
        </div>
    </div>
    <div class="search-container">
       <!-- <script>
        
    function filterTable() {
        var inputCategory, filterCategory, table, tr, tdCategory, i;
        inputCategory = document.getElementById("categorySelect");
        filterCategory = inputCategory.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            tdCategory = tr[i].getElementsByTagName("td")[3]; // Index 3 is for category column
            if (tdCategory) {
                var categoryMatch = filterCategory === "ALL" || tdCategory.textContent.toUpperCase().indexOf(filterCategory) > -1;
                if (categoryMatch) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script> -->

      
        <form id="myForm">
            <select onchange="filterTable()" name="category" id="categorySelect">
                <option value="all">All</option>
                <option value="Chemicals">Chemicals</option>
                <option value="Consulting Services">Consulting Services</option>
                <option value="Engineering">Engineering</option>
                <option value="Food Industries">Food Industries</option>
                <option value="Logistics Services">Logistics Sevices</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Machinery">Machinery</option>
                <option value="Pharmaceuticals">Pharmaceuticals</option>
                <option value="Plastic Industry">Plastic Industry</option>
                <option value="Professionals">Professionals</option>
                <option value="Service Provider">Service Provider</option>
                <option value="Trading">Trading</option>
                <option value="Others">Others</option>
            </select>
            <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search for company names..">
        </form>
    </div>
    <span>
      <a href="company.php"><input type="button" value="Add Company Website" id="add" /></a>
    </span>
    <div class="table-container">
        <table id="myTable">
            <tr>
                <th>ID</th>
                <th>Company Logo</th>
                <th>Company Name</th>
                <th>Category</th>
                <th>Company Website</th>
                <th>Action</th>
            </tr>
            <?php
            
            $sql = "SELECT * FROM `club members` ORDER BY Companyname ASC";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row["id"]; ?>
                        </td>
                        <td><img src="<?php echo $row["companylogo"]; ?>" alt="company logo" /></td>
                        <td>
                            <?php echo $row["Companyname"]; ?>
                        </td>
                        <td>
                            <?php echo $row["Category"]; ?>
                        </td>
                        <td><button><a href="<?php echo $row["companyurl"]; ?>" target="_blank">Click Here</a></button></td>
                        <td>
                            <a href="edit.php">Edit</a>
                            <a href="delete.php">Delete</a> 
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }
            ?>
        </table>
        
    </div>
    

    <script>
        function filterTable() {
            var inputCategory, inputName, filterCategory, filterName, table, tr, tdCategory, tdName, i;
            inputCategory = document.getElementById("categorySelect");
            inputName = document.getElementById("myInput");
            filterCategory = inputCategory.value.toUpperCase();
            filterName = inputName.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                tdCategory = tr[i].getElementsByTagName("td")[3]; // Index 3 is for category column
                tdName = tr[i].getElementsByTagName("td")[2]; // Index 2 is for company name column
                if (tdCategory && tdName) {
                    var categoryMatch = filterCategory === "ALL" || tdCategory.textContent.toUpperCase().indexOf(filterCategory) > -1;
                    var nameMatch = tdName.textContent.toUpperCase().indexOf(filterName) > -1;
                    if (categoryMatch && nameMatch) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>