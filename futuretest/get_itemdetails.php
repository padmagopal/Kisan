<?php
include("db.php");
session_start();
$sql="SELECT * from `product_details` where product_id='".$_POST['id']."'";
$result=mysqli_query($db,$sql);

if($result==true){
	while($row=mysqli_fetch_array($result)){
		$data[0]=$row[1];
		$data[1]=$row[2];
	  $data[2]=$row[0];
		$data[3]=$row[5];
		$_SESSION['product_id']=$row[0];
	}
  echo json_encode($data);
}
?>
