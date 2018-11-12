<!--Author: Kumaraswamy V S -->
<html>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT=0>
<head>
    <title>Add products</title>
    <link rel="stylesheet" type="text/css" href="design1.css">

</head>
<body>
<div class="background"><img src="cover.jpg"> </div>
<div class="foreground">
    <div id="rectbox2"><br><br>
      <form method="post" action="addProduct.php">
          &emsp;&emsp;<p id="msg1" style="color:aliceblue"></p>
          <B><h3>&emsp;&emsp;&emsp;&emsp;Add Product here</h3></B><br>
         <center> <p id="warn" style="color: red;size:25px;"></p></center>
        <input class="textvalues" name="p_id" placeholder="Product ID" required><br><br>
          <input class="textvalues" name="p_name" placeholder="Product Name" required><br><br>
          <input class="textvalues" name="p_quan" placeholder="Quantity" required><br><br>
          <input class="textvalues" name="p_seller" placeholder="Seller" required><br><br><br>
          <input type="submit" class="submit-btn2" name="submit" >
      </form>
        <button><a href="adminPortal.php">Go back</a> </button>
    </div>
</div>
<?php
include('connection.php') ;

 if(isset($_POST['submit'])) {
     $p_id =$_POST['p_id'];
     $pname = $_POST['p_name'];
     $quant = $_POST['p_quan'];
     $seller = $_POST['p_seller'];
     $qu="select * from product where prodID='$p_id';";
     $re=$con->query($qu);
     if(mysqli_num_rows($re)>0)
     {
         echo "<script>document.getElementById('warn').innerHTML='This product already exists!';</script>";

     }
     else {
         $sql = "insert into product values('$p_id','$pname','$quant','$seller');";
         $result = $con->query($sql);
         echo "<script>document.getElementById('msg1').innerHTML='Product added successfully';</script>";
     }
 }
 ?>
</body>
</html>