<?php

include("db.php");
session_start();
$new=$_POST["newpass"];

$query="Update users set user_password='".$new."' where email='".$_SESSION["email"]."' ";
$status=mysqli_query($db,$query);

if ($status) 
{
    //echo "hh";
	echo "<script>if(confirm('Password has been Updated Successfully!!')){document.location.href='customer.php'};</script>";
	//echo "<script>else{document.location.href:'customer.php'};</script>";
}

?>