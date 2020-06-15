<?php
include("db.php");
echo $_POST['product_name'];
$sql="UPDATE `product_details` set `product_name`='".$_POST['product_name']."',`product_price`='".$_POST['price']."',`product_image`='".$_POST['image']."',`product_category`='".$_POST['ctry']."'WHERE product_id='".$_POST['product_id']."'";
$result=mysqli_query($db,$sql);
header('location:item2.php')
?>
?>
