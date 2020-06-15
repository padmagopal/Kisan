<?php

$conn= mysqli_connect('localhost', 'root', '','u459976464_shop');

if(!$conn)
{
	die("could not connect to the databse".mysqli_error());
}


//echo $_POST['name'];
if (isset($_POST['name'])) {
    $name = $_POST['name'];

}
if (isset($_POST['email'])) {
    $mail=$_POST['email'];
}
if (isset($_POST['pwd1'])) {
    $pwd1=$_POST['pwd1'];
}

if (isset($_POST['mobile'])) {
    $mobile1=$_POST['mobile'];
}
/*if (isset($_POST['mobile'])) {
    $typecomm=$_POST['type'];
}*/

$role=$_POST['type'];
if($role==2)
{
	$role1="Farmer";
}
else
{
	$role1="customer";
}
//$mail=$_POST['email'];

$date=date("Y-m-d");
//$month=date("n");
//$date1=date("j-n-Y");
echo $role1;
echo $mobile1;
$error="select * from user where email='".$mail."'";
$res=mysqli_query($conn,$error);
$flag=1;
if(mysqli_num_rows($res) > 0)
{
$flag=0;
echo "<script>if(confirm('email already exists')){document.location.href='register.html'};</script>";
}
$password = mysqli_real_escape_string($conn, $pwd1);
$password = password_hash($password, PASSWORD_DEFAULT);
echo $password;
if ($flag)
{
	
	$id1=$mobile1."@";
	$query="INSERT INTO `users`(`user_id`,`user_name`,`email`, `user_password`,  `mobile`,`date`,`role`) VALUES ('".$id1."','".$name."','".$mail."','".$password."','".$mobile1."','".$date."','".$role1."')";
//echo $query;
	$status=mysqli_query($conn,$query);
	echo "<script>if(confirm('You Registered Sucessfully . Now Login')){document.location.href='login.html'};</script>";

}

	?>
