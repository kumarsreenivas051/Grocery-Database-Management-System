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
        <form method="post" action="addStaff.php">
            &emsp;&emsp;<p id="msg1" style="color:aliceblue"></p>
            <B><h3>&emsp;&emsp;&emsp;&emsp;Add Staff here</h3></B><br>
            <center> <p id="warn" style="color: red;size:25px;"></p></center>
            <input class="textvalues" name="st_id" placeholder="Staff ID" required><br><br>
            <input class="textvalues" name="st_name" placeholder="Staff Name" required><br><br>
            <input class="textvalues" name="st_phno" placeholder="Contact No" required><br><br>
            <input class="textvalues" name="st_adr" placeholder="Address" required><br><br><br>
            <input type="submit" class="submit-btn2" name="submit" >
        </form>
        <button><a href="adminPortal.php">Go back</a> </button>
    </div>
</div>
<?php
include('connection.php') ;
$stid =$_POST['st_id'];
$stname = $_POST['st_name'];
$stphno = $_POST['st_phno'];
$staddr = $_POST['st_adr'];
if(isset($_POST['submit'])) {
    $qu="select * from staff where staffID='$p_id';";
    $re=$con->query($qu);
    if(mysqli_num_rows($re)>0)
    {
        echo "<script>document.getElementById('warn').innerHTML='Staff already exists!';</script>";

    }
    else {
        $sql = "insert into staff values('$stid','$stname','$stphno','$staddr');";
        $result = $con->query($sql);
        echo "<script>document.getElementById('msg1').innerHTML='Staff Member added successfully';</script>";
    }
}
?>
</body>
</html>