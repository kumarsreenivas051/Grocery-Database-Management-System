<?php
if(!isset($_SESSION))
{
    session_start();
}
error_reporting(0);
include('connection.php');
if(isset($_POST['submit'])){

    foreach($_POST['quantity'] as $key => $val) {
        if($val==0) {
            unset($_SESSION['cart'][$key]);
        }else{
            $_SESSION['cart'][$key]['quantity']=$val;
        }
    }

}

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body bgcolor="#ffb100">
<nav class="navbar-main">

</nav>
<h1>View cart</h1>
<a href="home.php?page=userPortal"><button id="btn">Go back to the products page.</button></a><br/>
<form method="post" action="home.php?page=cart">

    <table>

        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Items Price</th>
        </tr>

        <?php

        $sql="SELECT * FROM product WHERE prodID IN (";

        foreach($_SESSION['cart'] as $id => $value) {
            $sql.=$id.",";
        }

        $sql=substr($sql, 0, -1).") ORDER BY prodName ASC";
        $query=$con->query($sql);
        $totalprice=0;
        while($row=mysqli_fetch_array($query)){
            $subtotal=$_SESSION['cart'][$row['prodID']]['quantity']*$row['amount'];
            $totalprice+=$subtotal;
            $cartOutput.='<form action="cart.php" method="post">
                          <input type="hidden" name="order-pname[]" value="'.$row['prodName'].'">
                    <input type="hidden" name="order-price[]" value=" '.$row['amount'].'">
                    <input type="hidden" name="order-qty[]" value="' .$_SESSION['cart'][$row['prodID']]['quantity'] . '">
                    <input type="hidden" name="order-total[]" value="'.$_SESSION['cart'][$row['prodID']]['quantity']*$row['amount'].'">
                    <input type="hidden" name="item-id" value="' . $row['prodID'] . '">
';
            ?>
            <tr>
                <td><?php echo $row['prodName'] ?></td>
                <td><input type="text" name="quantity[<?php echo $row['prodID'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['prodID']]['quantity'] ?>" /></td>
                <td>₹<?php echo $row['amount'] ?></td>
                <td>₹<?php echo $_SESSION['cart'][$row['prodID']]['quantity']*$row['amount'] ?></td>
            </tr>
            <?php

        }

        ?>
        <tr>
            <td colspan="4">Total Price: ₹<?php echo $totalprice ?></td>
        </tr>

    </table>
    <br />
    <button type="submit" name="submit" id="update">Update Cart</button>


</form><!--
<form method="post" action="cart.php">
    <input type="submit" name="checkout" id="chk_btn" value="Checkout">
</form>-->
<?php
if(isset($_POST['checkout']))
{

    $i=0;
    $uname = $_SESSION['username'];
    $pName=$_POST['order-pname'];
    $prodID = $_POST['item-id'];
    $quant = $_POST['order-qty'];
    $item_price = $_POST['order-total'];
    foreach($prodID as $id)
    {
        $pid = $id;
        $pName = $pName[$i];
        $quant=$quant[$i];
        $item_price=$item_price[$i];
        $q = "insert into orders values('$uname','$pName','$prodID','$quant','$item_price','');";
        $re = $con->query($q);
        $i=$i+1;
    }
    session_destroy();
}
?>
<br />
<p>To remove an item set its quantity to 0. </p>
</body>
</html>