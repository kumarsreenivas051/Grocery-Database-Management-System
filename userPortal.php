<html>
<head>
    <meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <link rel="stylesheet" type="text/css" href="design1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <link rel="shortcut icon" href="download.png" type="image/png" sizes="16*16">
    <title>
        User portal
    </title>

</head>

<body>
<div class="background">
    <img src="cover.jpg">
</div>
<div class="foreground">


                <form action="index.php" method="post">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="submit" name="ulogout" style="background:lawngreen ;" class="submit-btn">
                </form>


<?php

include('connection.php');

$sql = "SELECT * FROM product;";
$result = $con->query($sql);
if ($result->num_rows > 0){
    echo "<center>";
echo "<table><tr><th>Product ID</th><th>Name</th><th>Quantity</th><th>Seller</th></tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>".$row["prodID"]."</td><td>".$row["prodName"] ."</td><td>".$row["prodQuant"]."</td><td>".$row["prodSeller"]."</td>";
    echo "</tr>";
}
    echo "</table>";
}
?>
</div>
</body>
</html>
