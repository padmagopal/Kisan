<?php

include("db.php");
$que="select * from users";
$sta1=mysqli_query($db,$que);

while($r=mysqli_fetch_array($sta1))
{
    //echo "hi";
    $status=$r['status'];

	if(($status[0]==0) )
	{
		$qe="update users set status=1 where status=0 and not(role='admin')";
		$st1=mysqli_query($db,$qe);
		echo $qe;
		if($st1)
		{
		    echo "<script>if(confirm('Successfully Stopped!!')){document.location.href='welcome.php'};</script>";
		}
	}
	else
	{
	    echo "<script>if(confirm('Already in stop Phase!!')){document.location.href='welcome.php'};</script>";
	}
}



?>