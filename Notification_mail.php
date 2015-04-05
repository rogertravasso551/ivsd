<html>
<head>
<link rel="stylesheet" type="text/css" href="css/internal/style2.css">
<link rel="stylesheet" type="text/css" href="css/internal/paginate.css">
</head>
<form action="notify_send.php" method="post">
    <?php
	  $dbName = "IVSD";
    $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
    mysql_select_db($dbName,$conn) or exit(mysql_error());

	$start=0;
            $limit=5;
            $page='';
            if(isset($_GET['page']))
            {
	             $page=$_GET['page'];
	             $start=($page-1)*$limit;
            }

	$sql=mysql_query("SELECT `firstname`, `lastname`, `email` FROM `register1` LIMIT $start, $limit",$conn);
	$i=0;
	$firstName=array();
	$lastname=array();
	$email=array();
	$num=mysql_num_rows($sql);
	while($row=mysql_fetch_array($sql))
	{
		$firstName[$i]=$row['firstname'];
		$lastName[$i]=$row['lastname'];
		$email[$i]=$row['email'];
		$i++;
	}
	
	echo'<table cellpadding="3px" style="border:1px solid;border: 1px solid;border-color: lightgrey;width: 99%;overflow:scroll;height:100px;">';
	echo'<tr style="background-color: #367fa9;font-size: 22px;font-family: cursive;color-rendering: optimizeQuality;color: white;">';
	echo'<td style="padding-left: 35px;margin-right: -1px;padding-top: 19px;padding-bottom: 10px;">Name</td>';
	echo'<td style="padding-left: 35px;margin-right: -1px;padding-top: 19px;padding-bottom: 10px;">Lastname</td>';
	echo'<td  style="padding-left: 35px;margin-right: -1px; width: 43%;padding-top: 19px;padding-bottom: 10px;">Email-Id</td>';
	echo'</tr>';
	
	for($i=0;$i<$num;$i++)
	{
	
	echo'<tr style="background-color: ghostwhite;">';
	echo'<td style="padding: 10px 16px;font-size: 16px;font-family: sans-serif;color: #367fa9;">';
    echo'<input type="checkbox" name="s[]" value="'.$email[$i].'">'.$firstName[$i].'</input>';
	echo'</td>';
	echo'<td style="padding: 10px 16px;font-size: 16px;font-family: sans-serif;color: #367fa9;">'.$lastName[$i].'</td>';
	echo'<td style="padding: 10px 16px;font-size: 16px;font-family: sans-serif;color: #367fa9;">'.$email[$i].'</td>';
	echo'</tr>';
	echo'<br>';

	}
	$rows=mysql_num_rows(mysql_query("SELECT `firstname`, `lastname`, `email` FROM `register1`"));
//pagination logic
				
                $total=$rows;
                $stages = 1;
			
				
				

// Initial page num setup
if ($page == 0){$page = 1;}
$prev = $page - 1; 
$next = $page + 1; 
$lastpage = ceil($total/$limit); 
$LastPagem1 = $lastpage - 1; 

//main logic
$paginate = '';
if($lastpage > 1)
{ 

$paginate .= "<div class='paginate' style='  margin-top: -39px;
  margin-left: 223px;'>";
// Previous
if ($page > 1){
//echo "<a href='?page=".($page-1)."' class='button'>PREVIOUS</a>";
$paginate.= "<a href='?page=".$prev."'>previous</a>";
}else{
$paginate.= "<span class='disabled'>previous</span>"; }


// Pages 
if ($lastpage < 7+ ($stages * 2)) // Not enough pages to breaking it up
{ 
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='?page=".$counter."'>$counter</a>";} 
}
}
elseif($lastpage > 5 + ($stages * 2)) // Enough pages to hide a few?
{
// Beginning only hide later pages
if($page < 1 + ($stages * 2)) 
{
for ($counter = 1; $counter < 4+ ($stages * 2); $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='?page=".$counter."'>$counter</a>";} 
}
$paginate.= "...";
$paginate.= "<a href='?page=".$LastPagem1."'>$LastPagem1</a>";
$paginate.= "<a href='?page=".$lastpage."'>$lastpage</a>"; 
}
// Middle hide some front and some back
elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
{
$paginate.= "<a href='?page=1'>1</a>";
$paginate.= "<a href='?page=2'>1</a>";

$paginate.= "...";
for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='?page=$counter'>$counter</a>";} 
}
$paginate.= "...";
$paginate.= "<a href='?page=".$LastPagem1."'>$LastPagem1</a>";
$paginate.= "<a href='?page=".$lastpage."'>$lastpage</a>"; 
}
// End only hide early pages
else
{
$paginate.= "<a href='?page=1'>1</a>";
$paginate.= "<a href='?page=2'>2</a>";
$paginate.= "...";
for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page){
$paginate.= "<span class='current'>$counter</span>";
}else{
$paginate.= "<a href='?page=".$counter."'>$counter</a>";} 
}
}
}

// Next
if ($page < $counter - 1){
$paginate.= "<a href='?page=".$next."'>next</a>";
}else{
$paginate.= "<span class='disabled'>next</span>";
}

$paginate.= "</div>"; 

}
	
?>
	
	</table>
	<br>
    <input type="submit" name="formSubmit" value="Send Mail" class="style" style="margin-left: 214px;margin-top: 31px;" />
	</form>
	<br>
	<br>
	<?php echo $paginate;
   ?>


</html>