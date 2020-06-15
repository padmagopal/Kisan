<?php

include("db.php");
$que="select * from users";
$sta1=mysqli_query($db,$que);

while($r=mysqli_fetch_array($sta1))
{
	$status=$r['status'];

	if($status[0]==1)
	{
		$qe="update users set status=0 where status=1 and not(role='admin')";
		$st1=mysqli_query($db,$qe);
		if($st1)
		{
		    echo "<script>if(confirm('Successfully Started!!')){document.location.href='welcome.php'};</script>";
		}


	}
	else
	{
	    echo "<script>if(confirm('started')){document.location.href='welcome.php'};</script>";
	}
}



?>