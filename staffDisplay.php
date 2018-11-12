<html>
<head>
    <title>Staff Details</title>
    <style>
        table td,th,tr{
            border: 1px solid black;
            margin: 4px auto;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body bgcolor="#cd853f">
<center><h3>Staff details display</h3></center>
<?php
include('connection.php');
$sql = "SELECT * FROM staff;";
$result = $con->query($sql);

if ($result->num_rows > 0) {
echo "<form action='staffDisplay.php' method='post'>";
  echo "<center>";
    echo "<table><tr><th>Staff ID  </th><th> Name  </th><th>Contact Number  </th><th>Address </th></tr>";

        while($row = mysqli_fetch_array($result)) {
        echo "<tr><td>".$row["staffID"]."</td><td>".$row["staffName"]."</td><td>".$row["staffcontactno"]."&nbsp</td><td>".$row["staffAddress"]."</td>";
            echo "<td><button name='btn'><a href='deleteProd.php?id=".$row['staffID']."'>Delete</a></button></td>";
            echo "</tr>";
        }
        echo "</form>";
echo "</table>";

}

else {
echo "0 results";
}
?>
<button class="submit-btn"><a href="adminPortal.php">Go back</a></button>
</body>
</html>
