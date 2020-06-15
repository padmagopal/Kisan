<?php
include("db.php");
session_start();
$id=$_GET["id"];
$cost=$_GET["cost"];
$query="select * from `add_cart` where `product_id`='".$id."'";
$res=mysqli_query($db,$query);
if(mysqli_num_rows($res)>0)
{
	echo '<script language="javascript">';
  echo 'alert("This item is already in cart");';
  echo 'window.location.href = "shop.php"';
  echo '</script>';
}
else {
	$sql="INSERT INTO `add_cart`(`user_email`, `product_id`,`cost`) VALUES ('".$_SESSION['email']."','".$id."','".$cost."')";
	$result=mysqli_query($db,$sql);
	if($result==1){
		echo '<script language="javascript">';
		echo 'alert("added to cart");';
		echo 'window.location.href = "shop.php"';
		echo '</script>';
	}
else{
	echo '<script language="javascript">';
	echo 'alert("Sorry cant add this item to cart");';
	echo 'window.location.href = "shop.php"';
	echo '</script>';
}
	}
//	header("location:shop.php");
?>
