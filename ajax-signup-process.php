<?php
include_once("mysqlConnection.php");
session_start();
$suid=$_GET["suid"];
$spwd=$_GET["spwd"];
$smobile=$_GET["smobile"];
$user=$_GET["user"];
$_SESSION["uid"]=$suid;
$query="insert into users(uid,pwd,mobile,user,dos) values('$suid','$spwd','$smobile','$user',CURRENT_DATE)";
mysqli_query($dbcon,$query);
if(mysqli_error($dbcon)=="")
{
    echo "SignedUp Successfully";
    echo $user;
}
else
   echo mysqli_error($dbcon);

?>
