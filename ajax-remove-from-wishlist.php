<?php
session_start();
include_once("mysqlConnection.php");
$uid=$_SESSION["uid"];
$vid=$_GET["vid"];
$query="delete from wishlist where uid='$uid' and vid='$vid'";
mysqli_query($dbcon,$query);
   if(mysqli_error($dbcon)=="")
    {
        echo "removed from wishlist...";
    }
    else
        echo mysqli_error($dbcon);
?>
