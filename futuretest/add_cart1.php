<?php
include("db.php");
session_start();
if(isset($_POST["addcar"]))
{
    $id=$_POST["addcar"];    
}


//$query="select * from `product_details` where `product_id`='".$id."'";
//$res=mysqli_query($db,$query);
	$sql="INSERT INTO `add_cart`(`user_email`, `product_id`) VALUES ('".$_SESSION['email']."','".$id."')";
	echo $sql;
	$result=mysqli_query($db,$sql);

	if($result==1){
		header("location:cart.php");
	}
else{
	header("location:cart.php");
}
?>