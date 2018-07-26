<?php
session_start();
include_once("mysqlConnection.php");

 $btn=$_POST["btn"];

if($btn=="save")
{
    doSave($dbcon);
}
else
{
    doUpdate($dbcon);
}

function doUpdate($dbcon)
{
    $cid=$_POST["cid"]; 
    
   $orgName=$_FILES["cpic"]["name"];
   $tmpName=$_FILES["cpic"]["tmp_name"];
    if($orgName=="")
    {
        $picpath=$_POST["hdn"];
    }
    else
    {
     $picpath="uploads/".$orgName;
        move_uploaded_file($tmpName,$picpath);
    }

    $cfname=$_POST["cfname"];
    $clname=$_POST["clname"];
    $cmobile=$_POST["cmobile"];
    $cpro=$_POST["cpro"];
    $cemail=$_POST["cemail"];
    $cpwd=$_POST["cpwd"];
    $ccity=$_POST["ccity"];
    $cstate=$_POST["cstate"];
    $czip=$_POST["czip"];
    
   $query="update customers set picpath='$picpath',fname='$cfname',lname='$clname', mobile='$cmobile', profession='$cpro', email='$cemail', pwd='$cpwd', city='$ccity', state='$cstate',zip='$czip' where cid='$cid'";
    
   mysqli_query($dbcon,$query);
   if(mysqli_error($dbcon)=="")
    {
        if(mysqli_affected_rows($dbcon)!=0)
            echo "Record Updated........";
        else
            echo "Record Not found";
       header("location:cprofilenew.php");
    }
    else
        echo mysqli_error($dbcon);
}


function doSave($dbcon)
{
    $cid=$_POST["cid"]; 
    
   $orgName=$_FILES["cpic"]["name"];
   $tmpName=$_FILES["cpic"]["tmp_name"];
    
   $picpath="uploads/".$orgName;
    
    move_uploaded_file($tmpName,$picpath);
    
    $cfname=$_POST["cfname"];
    $clname=$_POST["clname"];
    $cmobile=$_POST["cmobile"];
    $cpro=$_POST["cpro"];
    $cemail=$_POST["cemail"];
    $cpwd=$_POST["cpwd"];
    $ccity=$_POST["ccity"];
    $cstate=$_POST["cstate"];
    $czip=$_POST["czip"];
    
   $query="insert into customers values('$cid','$picpath','$cfname','$clname','$cmobile','$cpro','$cemail','$cpwd','$ccity','$cstate','$czip')";
    
   mysqli_query($dbcon,$query);
    
    if(mysqli_error($dbcon)=="")
    {
        echo "Record Submitted........";
        header("location:cprofilenew.php");
    }
    else
        echo mysqli_error($dbcon);
}
?>