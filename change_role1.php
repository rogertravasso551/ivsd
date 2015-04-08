<?php
$dbName = "IVSD";
    $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
    mysql_select_db($dbName,$conn) or exit(mysql_error());
$r=array();
 $r = $_GET['email'];
 echo $r;
$role2=$_GET['status'];
echo $role2;
 

 $subject="Role Change";
$message="VIZUALIZATION,\n\nhi\n\n Dear user this is to inform to that your role has been updated to $role2\n\n Thank You.";
$headers = 'From: admin@gmail.com \r\n';

  $to=$r[0];
  
  echo"</br>";
  $retval=mail($to, $subject, $message, $headers);
 
 
 
$sa1=mysql_query("UPDATE `register1` SET `role1`='".$role2."' WHERE `email`='".$r."'");


?>
