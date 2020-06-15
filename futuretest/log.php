<?php
session_start();
include("db.php");
$mail=$_POST['mail'];
$pwd= mysqli_real_escape_string($db, $_POST["pwd"]);
$flag=0;
$sql="select * from users";
//echo $sql;
$result=mysqli_query($db,$sql);

//$row=mysqli_fetch_assoc($result);
while($row=mysqli_fetch_array($result))
{    
    $stat=$row['status'];
    if($row['status']==0) {
	if(($mail==$row['email']) && (password_verify($pwd, $row["user_password"])))
{

	$_SESSION['username']=$row['user_name'];
	$_SESSION['email']=$row['email'];
	if($row['role']=='Farmer')
	{
		header('location:farmer.php');
	}
	elseif($row['role']=='customer')
	{
		header('location:customer.php');
	}
	elseif($row['role']=='admin')
	{
		header('location:welcome.php');
	}
	$flag+=1;

}
else{
echo "<script>if(confirm('please enter correct credentials')){document.location.href='login.html'};</script>";
}

} }

$sql1="select status from users where email='".$mail."'";
//echo $sql;
$result1=mysqli_query($db,$sql1);
$re1=mysqli_fetch_row($result1);

if($re1[0]==1)
{
   echo "<script>if(confirm('Services are temporirly out contact the admin')){document.location.href='login.html'};</script>";
}

if($flag==0)
{
   echo "<script>if(confirm('You are temporarily blocked.Please try Login after sometime ')){document.location.href='login.html'};</script>";

}


?>
