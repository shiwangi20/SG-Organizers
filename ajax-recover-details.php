<?php
include_once("SMS_OK_sms.php");
include_once("mysqlConnection.php");
$luid=$_GET["luid"];
$query="select * from users where uid='$luid'";
$table=mysqli_query($dbcon,$query);
$count=mysqli_num_rows($table);
if($count==0)
    echo " Invalid id";
else
{
    $row=mysqli_fetch_array($table);
    
   echo SendSMS($row["mobile"],$row["pwd"]);
    
}

?>