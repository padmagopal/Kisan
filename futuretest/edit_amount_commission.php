<?php
include("db.php");
session_start();
date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d");
$time=date("H:i:s a");
$sql="UPDATE `amount_wise_commision` set `date`='".$date."',`time`='".$time."',`target_amount`='".$_POST['target_amt']."',`commission_amount`='".$_POST['comm_amount']."',`within_days`='".$_POST['w_days']."',`tds`='".$_POST['tds_percent']."' WHERE target_id='".$_SESSION['target_id']."'";
$result=mysqli_query($db,$sql);
header('location:amount_commission.php')
?>