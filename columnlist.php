<?php
session_start();
?>
<?php

$con=mysql_connect("localhost", "root","");  
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}   
mysql_select_db("IVSD",$con);
$tableName=$_REQUEST['type'];
  
   $result=mysql_query("show columns from `".$tableName."`",$con);
   $n=mysql_num_rows($result); 
	
	echo "<table>";

   while($data = mysql_fetch_array($result))
   {  // echo $tableName;
       echo"<tr>";
       echo "<td align=center>".$data['Field']."</td>";
	   echo"</tr>";
    }
echo "</table>";

?>
