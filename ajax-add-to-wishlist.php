<?php
session_start();
include_once("mysqlConnection.php");
$uid=$_SESSION["uid"];
$vid=$_GET["vid"];
$query="select * from wishlist where uid='$uid' and vid='$vid'";

$table=mysqli_query($dbcon,$query);

 $count=mysqli_num_rows($table);

 if($count==0 && $vid!="")
 {
     $query="insert into wishlist values('$uid','$vid')";
 mysqli_query($dbcon,$query);
    
    if(mysqli_error($dbcon)=="")
        echo "Added to Wishlist....";
    else
        echo  mysqli_error($dbcon);
 }
 else
      echo "Already present in your wishlist";

?>
