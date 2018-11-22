<?php
session_start();
//echo $_SESSION['username'];
require("connection.php");
if(isset($_GET['page'])){

$pages=array("userPortal", "cart");

if(in_array($_GET['page'], $pages)) {

$_page=$_GET['page'];

}else{

$_page="userPortal";

}

}else{

$_page="userPortal";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="style.css" />

    <title>Shopping cart</title>

</head>

<body>

<div id="container">

    <div id="main">
          <?php  require($_page.".php"); ?>
    </div>
    <!--<div id="sidebar">
        <h1>Cart</h1>
        <?php
           /*

        if(isset($_SESSION['cart'])){
            $sql="SELECT * FROM product WHERE prodID IN (";

            foreach($_SESSION['cart'] as $id => $value) {
                $sql.=$id.",";
            }

            $sql=substr($sql, 0, -1).") ORDER BY prodName ASC";
            $query=$con->query($sql);
            while($row=mysqli_fetch_array($query)){

                ?>
                <p><?php echo $row['prodName'] ?> x <?php echo $_SESSION['cart'][$row['prodID']]['quantity'] ?></p>
                <?php

            }
            ?>
            <hr />

            <?php

        }else{

            echo "<p>Your Cart is empty. Please add some products.</p>";

        }
        error_reporting(E_ALL ^ E_WARNING);
        */?>
    </div> -->
    <a href="home.php?page=cart"><button id="chk_btn">Go to cart</button></a>
    </div><!--end sidebar-->
<!--end container-->
</body>
</html>
