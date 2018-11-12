<html>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT=0>
<head>
    <title>Admin Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="design2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="background">

</div>
<div class="foreground">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="adminPortal.php">Home</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a class="navbar-brand" href="addProduct.php" >Add Product</a>
            <a class="navbar-brand" href="addStaff.php">Add Staff</a>
            <a  class="navbar-brand" href="staffDisplay.php">Staff display</a>
            &emsp;&emsp;&emsp;
        </div>
        <form class="navbar-form navbar-left" action="index.php" method="post">
            <div class="form-group">
                <input type="search" class="form-control" name="user_log" placeholder="Search">
            </div>
            <button type="submit" name="logsubmit" style="background:lawngreen" class="btn btn-default" onclick="suc()">Submit</button>
        </form>
        <div style="margin-top: 8px;">
        <form method="post">
            <button type="submit" name="logout" style="background:lawngreen ;" class="btn">Logout</button>
        </form>
        </div>
    </div>
</nav>
<br>

    <div>

    </div>
    <div id="titl">
    <h3><center><font color="#7fff00">Product Details</font></center></h3>
    </div>
<div id = "rect4">
<?php
include('connection.php');

$sql = "SELECT * FROM product;";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
    echo "<table><tr><th>Product ID  </th><th> Name  </th><th>Quantity  </th><th>Seller  </th><<th>Action</th></tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr><td>".$row["prodID"]."</td><td>".$row["prodName"]."</td><td>".$row["prodQuant"]."&nbsp</td><td>".$row["prodSeller"]."</td>";
        echo '<td><input type="submit" name="delete"></td>';
        echo "</tr>";
    }
    echo "</form>";
    echo "</table>";

}

else {
    echo "0 results";
}
if(isset($_POST['logout'])) {
    header('location:index.php');
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
}
if(isset($_POST['delete']))
{
    $dID =$_POST['name'];
    $deleteQ = "delete from product where prodID=$dID;";
    mysql_query($deleteQ,$con);
}
?>

</div>
</div>
</body>
</html>
