$query="SELECT * from users where email='".$mail."'";
echo $query;
$row=mysqli_fetch_array(mysqli_query($conn,$query));
$user_id=$row[1];
$ref_id=$row[6];
$day=date("Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time=date("h:i:s a");


$hnum=$_POST["hno"];
$street=$_POST["street"];
$area=$_POST["area"];
$lmark=$_POST["lmark"];
$city=$_POST["city"];
$state=$_POST["state"];
$pin=$_POST["pin"];

$qw="select referral from users where email='".$mail."'";

$sw=mysqli_query($conn,$qw);

$re=mysqli_fetch_row($sw);
$re1=$re[0];
$qwe="select * from users where mobile='".$re1."'";
$st5=mysqli_query($conn,$qwe);
while ($r3=mysqli_fetch_array($st5))
{
//$ref1=$r["ref_id"];
$date3=$r3["date"];
}

//echo "ref is".$re1;
$que="select Sum(total) from order_details where ref_id='".$re1."'";
$stats=mysqli_query($conn,$que);

$totalamt1=mysqli_fetch_row($stats);
$totalamt=$totalamt1[0];
//echo 'toat is '.$totalamt1[0];

$que1="select * from users where mobile='".$re1."'";
$sta1=mysqli_query($conn,$que1);

while ($row1=mysqli_fetch_array($sta1))
{
//echo "hi";
$mails=$row1['email'];
if ($mail==$mails)
{
  //echo "hello";
  $date=$row1["date"];
  $d = date_parse_from_format("Y-m-d", $date);
  $ro=$d["month"];
  break;
}
}
$d = date_parse_from_format("Y-m-d", $date3);
$ro=$d["month"];
$refmon=$ro;//referal registerd month
//echo $refmon;
$d1 = date_parse_from_format("Y-m-d", $date3);
$ro1=$d1["day"];
$refdy=$ro1;//referal registerd day


$cur=$day;
$cur1 = date_parse_from_format("Y-m-d", $cur);
$curmon=$cur1["month"];//product ordered month
//echo $curmon;

$cur1=$day;
$cur2 = date_parse_from_format("Y-m-d", $cur1);
$curdy=$cur2["day"];//product ordered day


$mondiff=$curmon[0]-$refmon[0];
//echo $mondiff;
$sal="select * from amount_wise_commision";
$sta1=mysqli_query($conn,$sal);

while ($row2=mysqli_fetch_array($sta1))
{
//echo "hi10";
$reta[]=$row2['target_amount'];
$amt[]=$row2['commission_amount'];
}
$r=$reta;
//echo "1 is ".$r[0];
$am=$amt;
//echo "2 is ".$am[0];
echo "1";
echo count($r);
for ($i=0; $i<count($r) ; $i++)
{

  function dateDiffInDays($date1, $date2)
  {
      //echo "4";
      // Calulating the difference in timestamps
      $diff = strtotime($date2) - strtotime($date1);

      // 1 day = 24 hours
      // 24 * 60 * 60 = 86400 seconds
      return abs(round($diff / 86400));
  }
  //echo "2";
  // Start date
  $date1 = $date3;
  //echo "3";
  // End date
  $date2 = $cur;

  // Function call to find date difference
  $dateDiff = dateDiffInDays($date1, $date2);

  if(($dateDiff>30*$i) || ($dateDiff<=30*($i+1)))
  {
    //echo "entered";
  $tar=$r[$i];
  //$c=$i;
  //echo "tar is ".$tar;
  break;
}
if((($dateDiff>30*$i) || ($dateDiff<=30*($i+1)))&&($totalamt==$tar))
  {

    //echo "entered";
  $tar=$r[$i+1];
  //$c=$i;
  //echo "tar is ".$tar;
  break;
}



}
$tar1=$tar;
//echo $tar1;
//echo $totalamt;
if (($totalamt>=$tar1) )
{
  //echo "2";
//echo "<script>if(confirm('User temporarrily blocked . Please use other referral id for shopping')){document.location.href='index.php'};</script>";

//    echo $ref;

$qre="select Count(*) as total from commission_details where ref_id='".$re1."' and type='amount_wise_commission' ";

$sat=mysqli_query($conn,$qre);

$data=mysqli_fetch_array($sat);
//echo $data[0];

if ($data[0]==1)
{
  //echo "1";
  //echo "4";
          for ($i=0; $i <sizeof($_SESSION['product_name']) ; $i++)
            {
              $product=ltrim($_SESSION['product_name'][$i]);
              $query1="SELECT * from product_details where product_name='".rtrim($product)."'";
              $row=mysqli_fetch_array(mysqli_query($conn,$query1));
              $product_id=$row[0];
              $quantity=$_SESSION['quantity'][$i+1];
              $rate=rtrim($_SESSION['rate'][$i]);
                 $sqlx="SELECT status2 from users where email='".$mail."'";
                  $row=mysqli_fetch_row(mysqli_query($conn,$sqlx));
                $s=$row[0];
              $sql="INSERT INTO `order_details`(`date`, `time`, `user_id`, `ref_id`, `product_id`,`hno`,`street`,`area`,`landmark`,`city`,`state`,`pincode`,`email`, `quantity`,`total`) VALUES ('".$day."','".$time."','".$user_id."','".$ref_id."','".$product_id."','".$hnum."','".$street."','".$area."','".$lmark."','".$city."','".$state."','".$pin."','".$mail."','".$quantity."','".ltrim($rate)."')";
              echo $sql;
              $res=mysqli_query($conn,$sql);
              if($res==true)
              {
                  $sql="DELETE from add_cart where user_email='".$mail."'";
                  $result=mysqli_query($conn,$sql);
     //     		  	unset ($_SESSION["product_name"]);
                  unset ($_SESSION["quantity"]);
                  unset ($_SESSION["rate"]);
                  unset ($_SESSION["total"]);
                  $sql2="SELECT status2 from users where email='".$mail."'";
                  $row=mysqli_fetch_row(mysqli_query($conn,$sql2));
                  $s=$row[0];
                  if($result==true)
                  {


                    // header("Location:my_orders.php");

                  }



                }
            }
    }


else
{
  //echo "5";
  date_default_timezone_set('Asia/Kolkata');
  $time1=date('H:i:s');
  for ($l=0; $l < count($r); $l++)
  {
    if ($r[$l]==$tar1)
    {
//				echo "4";
      $at=$am[$l];

    }
  }
//	echo "5";
  $qr="INSERT INTO `commission_details` (`date`, `time`, `ref_id`, `commission_amount`,`type`,email) VALUES ('".$day."','".$time1."','".$re1."','".$at."','amount_wise_commission','".$mail."')";
  $st2=mysqli_query($conn,$qr);
  /*if ($st2)
  {
    echo "Inserted Successfully";
  }*/

  $query="SELECT * from users where email='".$mail."'";
  echo $query;
$row=mysqli_fetch_array(mysqli_query($conn,$query));
$user_id=$row[1];
echo $user_id;
$ref_id=$row[6];

for ($i=0; $i <count($_SESSION['product_name']) ; $i++)
{
    //echo "hi";
  $product=ltrim($_SESSION['product_name'][$i]);
  $query1="SELECT * from product_details where product_name='".rtrim($product)."'";
        echo $query1;
  $row=mysqli_fetch_array(mysqli_query($conn,$query1));
  $product_id=$row[0];
  $quantity=$_SESSION['quantity'][$i+1];
  $rate=rtrim($_SESSION['rate'][$i]);

  $sql="INSERT INTO `order_details`(`date`, `time`, `user_id`, `ref_id`, `product_id`,`hno`,`street`,`area`,`landmark`,`city`,`state`,`pincode`,`email`, `quantity`,`total`) VALUES ('".$day."','".$time."','".$user_id."','".$ref_id."','".$product_id."','".$hnum."','".$street."','".$area."','".$lmark."','".$city."','".$state."','".$pin."','".$_SESSION["email"]."','".$quantity."','".ltrim($rate)."')";
  echo $sql;
  $res=mysqli_query($conn,$sql);
  if($res==true)
  {
      $sql="DELETE from add_cart where user_email='".$mail."'";
      $result=mysqli_query($conn,$sql);
      unset ($_SESSION["quantity"]);
      unset ($_SESSION["rate"]);
      unset ($_SESSION["total"]);

      if($result==true)
      {

      //     header("Location:my_orders.php");

      }
    }
}
}
}

else
{
  //echo "5";
$query="SELECT * from users where email='".$mail."'";
$row=mysqli_fetch_array(mysqli_query($conn,$query));
$user_id=$row[1];
$ref_id=$row[6];

  echo $_SESSION['username'];
  //echo $row[6];

for ($i=0; $i <sizeof($_SESSION['product_name']) ; $i++)
{
    //echo "hi";
  $product=ltrim($_SESSION['product_name'][$i]);
  $query1="SELECT * from product_details where product_name='".rtrim($product)."'";
  $row=mysqli_fetch_array(mysqli_query($conn,$query1));
  $product_id=$row[0];
  $quantity=1;//$_SESSION['quantity'][$i+1]
  $rate=rtrim($_SESSION['rate'][$i]);

  $sql="INSERT INTO `order_details`(`date`, `time`, `user_id`, `ref_id`, `product_id`,`hno`,`street`,`area`,`landmark`,`city`,`state`,`pincode`,`email`, `quantity`,`total`) VALUES ('".$day."','".$time."','".$user_id."','".$ref_id."','".$product_id."','".$hnum."','".$street."','".$area."','".$lmark."','".$city."','".$state."','".$pin."','".$_SESSION["email"]."','".$quantity."','".ltrim($rate)."')";
echo $sql;
  $res=mysqli_query($conn,$sql);
  if($res==true)
  {
      $sql="DELETE from add_cart where user_email='".$mail."'";
      $result=mysqli_query($conn,$sql);
//	  	unset ($_SESSION["product_name"]);
      unset ($_SESSION["quantity"]);
      unset ($_SESSION["rate"]);
      unset ($_SESSION["total"]);

      if($result==true)
      {
  //  		header("Location:my_orders.php");
      }
    }
}

}
