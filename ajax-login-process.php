<?php
include_once("mysqlConnection.php");
session_start();
$luid=$_GET["luid"];
$lpwd=$_GET["lpwd"];
$_SESSION["uid"]=$luid;
$query="select * from users where uid='$luid' and pwd='$lpwd'";
$table=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($table);
if($count==0)
    echo " Invalid id or Password";
else
{
 //echo " Login Successfully " ;
$row=mysqli_fetch_array($table);
    echo $row["user"];
    
}

?>
