<?php
include("db.php");
session_start();
$sql="SELECT * from `amount_wise_commision` where target_id='".$_POST['id']."'";
$result=mysqli_query($db,$sql);

if($result==true){
	while($row=mysqli_fetch_array($result)){
		$data[0]=$row[3];
		$data[1]=$row[4];
		$data[2]=$row[5];
		$data[3]=$row[6];
		$_SESSION['target_id']=$row[0];		
	}
  echo json_encode($data);
}
?>