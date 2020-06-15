<?php
  include("db.php");
  session_start();

  $sql="DELETE FROM `add_cart` WHERE `product_id`='".$_POST['id']."'";
  $result=mysqli_query($db,$sql);
  if($result==1){
  	echo "1";
  }
  else{
  	echo "0";
  }
?>