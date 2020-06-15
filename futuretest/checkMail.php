<?php
   include("db.php");
   $sql="select * from users where email='".$_POST['email']."'";
   $result=mysqli_query($db,$sql);
   if(mysqli_num_rows($result)>0){
   	  echo "0";
   }
   else{
   	echo "1";
   }
?>