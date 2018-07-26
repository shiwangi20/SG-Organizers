<?php

 include_once("mysqlConnection.php"); 

 $suid=$_GET["suid"];

 $query="select * from users where uid='$suid'";

 $table=mysqli_query($dbcon,$query);

 $count=mysqli_num_rows($table);

 if($count==0)
     echo " Available";
 else
     echo " Not Available";

?>