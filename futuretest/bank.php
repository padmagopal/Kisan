<?php
include("db.php");
session_start();

$sql="UPDATE `users` SET `account_name`='".$_POST['account_name']."',`account_num`='".$_POST['account_number']."',`bank_name`='".$_POST['bank_name']."',`branch_name`='".$_POST['branch_name']."',`ifsc`='".$_POST['ifsc_no']."',`pan_name`='".$_POST['pancard_name']."',`pan_num`='".$_POST['pancard_num']."' WHERE email='".$_SESSION['email']."'";
$res=mysqli_query($db,$sql);
if($res==true){
	header("location:bank_account.php");
}
?>