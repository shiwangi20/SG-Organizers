<?php

include_once("mysqlConnection.php");
session_start();

$cid=$_SESSION["uid"];

$query="select * from customers where cid='$cid'";

$table=mysqli_query($dbcon,$query);

$all=array();

while($row=mysqli_fetch_array($table))
{
    $all[]=$row;
}

echo json_encode($all);
?>