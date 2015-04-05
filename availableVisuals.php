<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/internal/style2.css">
	<link rel="stylesheet" type="text/css" href="css/internal/paginate.css">
</head>
<body style="background: #f9f9f9;">
<?php
$dbName = "IVSD";
		   
            $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
            mysql_select_db($dbName,$conn) or exit(mysql_error());
			
			$start=0;
            $limit=7;
            $page='';
            if(isset($_GET['page']))
            {
	             $page=$_GET['page'];
	             $start=($page-1)*$limit;
            }
			//select the values within the limit
			$sql1=mysql_query("select visname  from json LIMIT $start, $limit");
			
			// count the rows avalibable within the limit
			$num=mysql_num_rows($sql1);
			$i=0;
			//store the visname to vis
			while($row = mysql_fetch_array($sql1)) 
			{
				$vis[$i]=$row['visname'];
				$i++;
			}
			  //display the data within the limit
			for($i=0;$i<$num;$i++)
			{
			     echo '<form name="form1" action="select_vis.php"  method="POST" >';
				 echo '<input type="hidden" name="vis" value="'.$vis[$i].'">';
				
				 echo '<input type="submit" id="submit" value="'.$vis[$i].'" class="button" ></input>';
				 ?>
				 <br>
				 <?php
	             echo "</input>";
                 echo "</form>";				 
			}
			
			//pagination logic
				$rows=mysql_num_rows(mysql_query("select * from json"));
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

$paginate .= "<div class='paginate'>";
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

// pagination
echo $paginate;

               
			   
?>
</body>
</html>