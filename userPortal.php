<html>
<head>
    <link rel="shortcut icon" href="download.png" type="image/png" sizes="16*16">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>
        User portal
    </title>

</head>

<body>

<div id="container">
    <div id="main">
        <center><h1>Products in stock</h1></center>
        <?php

include('connection.php');
$sql = "SELECT * FROM product;";
$result = $con->query($sql);
if(isset($_GET['action']) && $_GET['action']=="add")
{
    $id = intval($_GET['id']);
    if(isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['quantity']++;
    }
    else
    {
        $q = "select * from product where prodID='$id';";
        $query = $con->query($q);
        if(mysqli_num_rows($query)!=0)
        {
          $row_p = mysqli_fetch_array($query);
          $_SESSION['cart'][$row_p['prodID']]=array(
                  "quantity"=>1,"price"=>$row_p['amount']
          );
        }
        else
        {
            $message = "This product id is invalid";
        }
    }
}
if ($result->num_rows > 0) {

    ?>
    <table><tr><th><center>Product ID</center></th><th><center> Name</center>  </th><!--<th><center>Quantity</center></th>--><th>Amount</th><th><center>Seller</center></th><th>Action</th></tr>
    <?php
    while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["prodID"];?></td>
            <td><?php echo $row["prodName"];?></td>
           <!-- <td><//?php echo $row["prodQuant"]; ?></td>-->
            <td><?php echo $row["amount"]; ?></td>
            <td><?php echo $row["prodSeller"]; ?></td>
            <td><a href="home.php?page=userPortal&action=add&id=<?php echo $row['prodID'] ?>"><button name="addtocart" id="addtocart">Add to cart</button></a></td>
        </tr>
        <?php
        if(isset($_POST['addtocart']))
        {
            echo "<script>document.getElementsByTagName('button').innerHTML='Added';</script>";
        }
    }
    echo "</table>";

}
else
{
    echo "Oops!No results!";
}
?>
        <form action="index.php" method="post">
            <input type="submit" name="ulogout" style="background:lawngreen ;" id="submit-btn" value="logout">
        </form>
</div>
</div>
</body>
</html>



