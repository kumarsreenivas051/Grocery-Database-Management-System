<!--
       Author:Kumaraswamy V S
       Project:Grocery Database Management System                                                                                                    -->

<html>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE, NO-STORE, must-revalidate">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT=0>
<head>
    <link rel="stylesheet" type="text/css" href="design1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
    <title>
        Welcome to e-Grocery store
    </title>

</head>
<body>
<div class="background">
    <img src="cover.jpg">
</div>
<div class="foreground">
    <nav class = "nav-menu">
                <a class="navbar-brand" href="index.php">GroceryDotCom</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <a class="navbar-brand" href="admin.php">Admin login</a>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

            <form class="navbar-form navbar-left" action="index.php" method="post">
                <div class="form-group">
                    <div style="float: right">
                    <input type="text" class="form-control" name="user_log" placeholder="Username" required>
                    <input type="password" class="form-control" name="user_pass" placeholder="Password" required>
                </div>
                </div>
                <button type="submit" name="logsubmit" style="background:lawngreen" class="btn btn-default">Login</button>

            </form>
            <center><b><p id="logfail" style="color: red;padding-top: 12px;"></p> </b></center>
        </div>
    </nav>
<div id="rectbox2"><br>
   <center> <h3 style="color: white;font-family:Verdana ">Don't have an account? Register here</h3></center><br>
    <center><b><p id="warn" style="size:30px;color:red;"></p></b></center><center><b><p id="nomatch"style="size:30px;color:red;"></p></b></center>
    <center><b><p id="succ" style="color:green;size: 30px;"></p> </b></center>
    <form method="post" action="index.php">
    <input class="textvalues" type="text" id="reg_id" name="userid" placeholder="UserID" required><br><br>
        <input class="textvalues" type="text" id="name" name="name" placeholder="Username" required><br><br>
        <input class="textvalues" type="email" id="email" name="email" placeholder="Email" required><br><br>
    <input class="textvalues" type="password" name="pwd" placeholder="Password" required><br><br>
        <input class="textvalues" type="password" name="cpwd" placeholder="Confirm Password"required><br><br>
       &emsp;&emsp;&emsp; <button class="submit-btn" style="background:lawngreen" type="submit" name="submit">register</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    </form>
</div>
<?php

ob_start();
session_start();
$server="localhost";
$dbname="r";
$username="root";
$password="";
if(isset($_POST['submit']))
{
    $con=mysqli_connect($server,$username,$password,$dbname);
    $uname=$_POST['userid'];
    $name = $_POST['name'];
    $mailid = $_POST['email'];
        $pwd=($_POST['pwd']);
        $cpwd=($_POST['cpwd']) ;
        if ($pwd == $cpwd)
            {
                $qu="select * from register where uname='$uname';";
                $re=$con->query($qu);
                if(mysqli_num_rows($re)>0)
                {
                    echo "<script>document.getElementById('warn').innerHTML='Account exists!!!';</script>";

                }
                else {
                    $sql = "insert into register values('$uname','$name','$mailid','$pwd','$cpwd');";
                    $result = $con->query($sql);
                    echo "<script>document.getElementById('succ').innerHTML='Account successfully created!!!';</script>";
                }
            }
            else
                {
                    echo "<script>document.getElementById('nomatch').innerHTML='Passwords do not match';</script>";
                }
}
if(isset($_POST['logsubmit']))
{
    $con=mysqli_connect($server,$username,$password,$dbname);
    $user=$_POST['user_log'];
    $upass= $_POST['user_pass'];
    $sqll="select uname,pwd from register where uname='$user' and pwd='$upass';";
    $res=mysqli_query($con,$sqll);
    if(mysqli_num_rows($res)>0 )
    {

        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $upass;
        header('location:userPortal.php');
    }
    else
    {
        echo "<script>document.getElementById('logfail').innerHTML='Login failed!'</script>";
    }
}
?>
</div>
<div style="top:15%;left:42.5%;"></div>
</body>
</html>