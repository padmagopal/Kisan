<?php

$conn=mysqli_connect("localhost","root","","u459976464_shop");
if(!$conn)
{
	die("Could not conect to the database".mysqli_error());

}

$tot_res2=[];
$head=array("Name","Mail ID","Mobile","Total","Delivery Status");


$que="select * from order_details";
$stats=mysqli_query($conn,$que);


while ($row=mysqli_fetch_array($stats))
{
    echo "hh";
    $email=$row['email'];
    $qe1="select * from users where email='".$email."' ";
    $st1=mysqli_query($conn,$qe1);
    while($row1=mysqli_fetch_array($st1))
    {
        $name=$row1['user_name'];
    
        $mobile=$row1['mobile'];
       
        $total=$row['total'];
        $status=$row['status'];

    	if(($status==0)||($status==1))
    	{
    	    $status="delivered";
    	   $tot_res= array($name,$email,$mobile,$total,$status);
            array_push($tot_res2,$tot_res);
    	//print_r($tot_res2);
    	}
    	else if($status==2)
    	{
    	    $status="not delivered";
    	   $tot_res= array($name,$email,$mobile,$total,$status);
            array_push($tot_res2,$tot_res);
    	}
        
    }
}



$c=0;
if(isset($_POST["excel"]))
{
	$filename="orders_track.xls";
	header('Content-Type:application/vnd.ms-excel');
	header("Content-Disposition: attachment;filename=\"$filename\"");
	$print=false;
	if (!empty($head)) 
	{
		//echo "1";
		if(!$print)
		{
			//while ($c<count($head)) 
			//{
				
				echo implode("\t", $head)."\n";
			//	$c+=1;
			//}
			$print=true;
		}
	}
	while ($c<count($tot_res2)) 
	{
		echo implode("\t", $tot_res2[$c])."\n";
		$c+=1;
	}
	exit();

}

?>