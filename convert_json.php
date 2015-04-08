

<?php
session_start();

// kill the page if the access variable doesn't exists
//            or if the access variable does exist but is not set to true
if(!isset($_SESSION['can_access']) || (isset($_SESSION['can_access']) && $_SESSION['can_access'] !== true))
{
   die('You cannot directly access this page!'); // kill the page display error
}
if($_SESSION['role1'] == "user")
{die(" Access denied");
}
?>

<?php
//Create Database connection

           $dbName = "IVSD";
		   
           $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
            mysql_select_db($dbName,$conn) or exit(mysql_error());
  $tableName=$_SESSION["tableName"];
		  $tabAtt=array();
		    $sql1=mysql_query("SELECT tab_attributes FROM  `report` ORDER BY rep_id DESC LIMIT 1",$conn);
			$num=1;
			 while ($row1 = mysql_fetch_assoc($sql1)) 
	        {	
			    $tabAtt[0]=implode("", $row1);
            }
			$data1="";
			for($x = 0; $x < $num; $x++) {
        $data1.=$tabAtt[$x];
		}
	
	  
  
  
           
           $sql=mysql_query("select ".$data1." from `".$tableName."` order by ".$data1."",$conn);
		
		    $json = array();
			 $comma_separated = array();
			$n=mysql_num_rows($sql);
		  
		 $i=0;
            while ($row = mysql_fetch_assoc($sql)) 
	        {	
         
			    $comma_separated[$i] = implode(".", $row);
			  $i++;
            }
		
	  $data="";
	  $data.="{gender:[";
	  
	   for($x = 0; $x < $n; $x++) {
	   $data.="{name:'";
        $data.=$comma_separated[$x];
		$data.="'},";
   
}
$data.="]}";




		  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>json PHP & MySQL</title>
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
	<link href="css/internal/style2.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery-ui-1.7.1.custom.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</script>
<script>
$(document).ready(function(){
   $('#submit').click(function(event){
            var postData = $("#visName1").val();
            
			console.log(postData);
           $.post('visCreate.php', {list: postData}, function(message){
		alert(""+ message);
	    
		
		});
        });
});
</script>
<script>

var data = <?php echo $data;?>;

var gender = data.gender.map(function(v) {
        return v.name.split(".");
    });

function addToHeirarchy(val, level, heirarchy) {
    if (val[level]) {
        if (!heirarchy.hasOwnProperty(val[level]))
            heirarchy[val[level]] = {};
        addToHeirarchy(val, level + 1, heirarchy[val[level]]);
    }
}

var working = {};

for (var i = 0; i < gender.length; i++)
    addToHeirarchy(gender[i], 0, working);

console.dir(working);

function remapHeirarchy(item) {
    var children = [];
    for (var k in item) {
        children.push({
            "name" : k,
            "children" : remapHeirarchy(item[k])
        });
    }
    return children;
}

var heirarchy = {
    "name" : "root",
    "children" : remapHeirarchy(working)
};

console.dir(heirarchy);
</script>
<script language="JavaScript"><!--
function functionName() {
  top.frame2.location.href = 'collapsable_tree.php';
 
  
  
}
function functionName1() {
 top.frame2.location.href = 'sunburst.php';
 }
 
 function functionName2() {
 top.frame2.location.href = 'radial.php';
 }
 function functionName3() {
			top.frame2.location.href = 'Notification_mail.php';
			}
			  function functionName4() {
 top.frame2.location.href = 'collapsibleIT.php';
 }
function functionName5() {
 top.frame2.location.href = 'forcedirected.php';
 }
 
 function functionName6() {
 top.frame2.location.href = 'forcedirected1.php';
 }
//--></script>
 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 <script type="text/javascript">
 $(function(){
 $.ajax({
	   url: 'convert_json.php',
	   type: 'post',
	   data: {"points" : JSON.stringify(heirarchy)},
	   success: function(data) {
	         $("#div1").html(result);
	   }
	});
	});
	
</script>
<?php


 $dbName = "IVSD";

             $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
             mysql_select_db($dbName,$conn) or exit(mysql_error());
			 $file=mysql_query("select id from `json` ORDER BY id DESC LIMIT 1");
			 global $fileName;
			 while($row=mysql_fetch_array($file))
			 {
				$fileName=$row['id'];
			 }
			 $insertValues="";
			 $fileName=$fileName+1;
			 $file1="";
			 $file1.="";
			  $file1.=$fileName;
			  
			  $file2="";
			  $file2.="json_files/";
			  $file2.="result";
			  $file2.=$fileName;
			  $file2.=".json";
			  
			  


if (isset($_POST["points"])) {
   $json = $_POST['points'];
   echo $json;
   $file = fopen($file2,'w+');
   fwrite($file, $json);
   fclose($file);
    $file3=mysql_query("INSERT INTO `json`(`id`,`name`,`visname`,`attributes`) VALUES ('".$file1."','".$file2."','".$tableName."','".$data1."')");
}
$_SESSION["file2"]=$file2;

?>

		
<br>
<br>
<br>
<br>
<br>
<br>
<button onClick="functionName()" class="style">Collapsable tree</button>
<input type="button" value="Sunburst" onClick="functionName1()" class="style">
<input type="button" value="Radial Chart" onClick="functionName2()" class="style">
<input type="button" value="collapsableIT" onClick="functionName4()" class="style">

<input type="button" value="forcedirected" onClick="functionName6()" class="style">
<br>
<br>
<br>
<h3 style="font-family: sans-serif;font-size:14px;"><i>Enter the name for visualization.</i></h3>

   <input type="text" name="visName" id="visName1"></input>
   <input type="submit" id="submit" style="box-shadow: inset 0 50px rgba(255,255,255,0.2), inset 0 -15px 30px rgba(91, 147, 180, 1), 0 5px 10px rgba(6, 43, 158, 0.5);input>
   <div id="div1"></div>
<input type="button" onClick="functionName3()" value="Notify users" class="style">
</head>

</html>
