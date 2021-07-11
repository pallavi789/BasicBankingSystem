<?php 
//echo "WELCOME TO THE STAGE WHERE WE ARE READY TO GET CONNECTED TO DATABASE <br>";
$servername = "localhost";
$username = "root";
$password = "";
$database="bank";

$conn = mysqli_connect($servername, $username, $password);
if($conn)
{
//echo  "CONNECTION WAS SUCCESSFULL";
}
else{
die("connection to this database failed due to " .mysqli_connect_error());
}



?>