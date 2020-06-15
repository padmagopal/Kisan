<?php 
include("db.php");
session_start();

$sql="UPDATE `users` SET `fname`='".$_POST['fname']."',`lname`='".$_POST['lname']."',`hno`='".$_POST['hno']."',`street`='".$_POST['street']."',`area`='".$_POST['area']."',`landmark`='".$_POST['landmark']."',`city`='".$_POST['city']."',`state`='".$_POST['state']."',`pincode`='".$_POST['pin']."' WHERE email='".$_SESSION['email']."'";
echo $sql;
$res=mysqli_query($db,$sql);

if($res==true){
    
header("location:profilec.php");
}
?>