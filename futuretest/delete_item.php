<?php
include("db.php");
$sql="DELETE FROM `product_details` WHERE `product_id`='".$_POST['id']."'";
$result=mysqli_query($db,$sql);
if($result==true){
	header("location:items_updates.php");
}

?>
