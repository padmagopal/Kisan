<?php

include("db.php");

if(isset($_POST["hi"]))
{
	//echo "1";
	$mobi=$_POST["hi"];
	$que="select * from users where mobile='".$mobi."' ";
	$sta=mysqli_query($db,$que);

	while ($row=mysqli_fetch_array($sta)) 
	{
		$status=$row['status'];
	}

	if ($status ==0) 
	{
		$v=1;
		$upd="Update users set status=$v where mobile='".$mobi."'";
		$sta1=mysqli_query($db,$upd);
		
		header("Location:allusers.php");
		
		
	}	
	else
	{
		$v=0;
		$upd="Update users set status=$v where mobile='".$mobi."' ";
		$sta1=mysqli_query($db,$upd);
		header("Location:allusers.php");
		
	}
}

?>