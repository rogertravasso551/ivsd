<?php
 $dbName = "IVSD";
    $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
    mysql_select_db($dbName,$conn) or exit(mysql_error());

 $n = $_POST['s'];
$num=count($n);

 

 $subject="new visualization";
$message="you have been updated to admin";
$headers = 'From: saniya@gmail.com \r\n';
for($i=0;$i<$num;$i++)
{
  $to=$n[$i];
  echo"</br>";
  $retval=mail($to, $subject, $message, $headers);
 }
 
 
 for($i=0;$i<$num;$i++)
{
 $sa=mysql_query("UPDATE `register1` SET `role1`='admin' WHERE `email`='".$n[$i]."'");
}


?>