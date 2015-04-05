<!DOCTYPE html>
<?php
session_start();

// kill the page if the access variable doesn't exists
//            or if the access variable does exist but is not set to true
if(!isset($_SESSION['can_access']) || (isset($_SESSION['can_access']) && $_SESSION['can_access'] !== true))
{
   die('You cannot directly access this page!'); // kill the page display error
}
?>
<html>
    <head>
	<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
	 <link rel="Stylesheet" type="text/css" href="style1.css" />
        <meta charset="UTF-8">
        <title>Visualization | ChangeRole</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/internal/paginate.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="dashboard.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                VISUALIZATION
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                           
                        </div>
                        <div class="pull-left info">
                            <?php
if($_SESSION["user_email"]) {
?>
Welcome <?php echo $_SESSION["user_email"]; ?>.<br> Click here to <a href="logout.php" tite="Logout">Logout.
<?php
}
?>

                            
                        </div>
                    </div>
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="fa fa-dashboard"></i> <span>dashboard</span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="upload.php">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Upload File</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            
                        </li>
                        <li class="treeview">
                            <a href="viewupload.php">
                                <i class="fa fa-laptop"></i>
                                <span>View File</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            
                        </li>
                        <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                            <a href="existing_visuals.php" target="_top" style="color:black;">
                                <i class="fa fa-edit"></i> <span>View Report</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            
                        </li>
						
						 <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                            <a href="change_role.php" target="_top" style="color:black;">
                                <i class="fa fa-edit"></i> <span>Change role</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            
                        </li>
						<li class="treeview">
                            <a href="change_report_status.php" style="color:black;">
                                <i class="fa fa-edit"></i> <span>Change report status</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            
                        </li>
                       
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       <i> Makes</i>
                        <small><i>Life Easy</i></small>
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
				<div >
              

				 



 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$dbName = "IVSD";
    $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
    mysql_select_db($dbName,$conn) or exit(mysql_error());

 $r = $_POST['s'];
$num=count($r);
$role2=$r[$num-1];

 

 $subject="Role change";
$message="VIZUALIZATION,\n\nhi\n\n Dear user this is to inform to that your role has been updated to $role2\n\n Thank You.";
$headers = 'From: admin@gmail.com \r\n';
for($i=0;$i<$num-1;$i++)
{
  $to=$r[$i];
  
  echo"</br>";
  $retval=mail($to, $subject, $message, $headers);
 }
 
 
 for($i=0;$i<$num;$i++)
{
$sa1=mysql_query("UPDATE `register1` SET `role1`='".$role2."' WHERE `email`='".$r[$i]."'");

}

}
?>
<div class="d2 col-lg-8 col-xs-8">
    <?php
	  $dbName = "IVSD";
    $conn = mysql_connect("localhost", "root", "") or exit(mysql_error());
    mysql_select_db($dbName,$conn) or exit(mysql_error());
	$start=0;
            $limit=6;
            $page='';
            if(isset($_GET['page']))
            {
	             $page=$_GET['page'];
	             $start=($page-1)*$limit;
            }

	
	$sql=mysql_query("SELECT `firstname`, `lastname`, `email`,`role1` FROM `register1` where role1<>'superadmin' LIMIT $start, $limit",$conn);
	$i=0;
	$firstName=array();
	$lastname=array();
	$email=array();
	$role=array();
	
	$num=mysql_num_rows($sql);
	while($row=mysql_fetch_array($sql))
	{
		$firstName[$i]=$row['firstname'];
		$lastName[$i]=$row['lastname'];
		$email[$i]=$row['email'];
		$role[$i]=$row['role1'];
		$i++;
	}
	echo'<div style="height:441px;width:900px;overflow-x: hidden;">';
	echo'<table cellpadding="3px" style="border:1px solid;border: 1px solid;border-color: lightgrey;width: 99%;overflow:scroll;height:100px;">';
	echo'<tr style="background-color: #367fa9;font-size: 19px;font-family: cursive;color-rendering: optimizeQuality;color: white;">';
	echo'<td style="padding-left: 35px;margin-right: -1px;padding-top: 19px;padding-bottom: 10px;"></td>';
	echo'<td style="padding-left: 35px;margin-right: -1px;padding-top: 19px;padding-bottom: 10px;">Name</td>';
	echo'<td style="padding-left: 35px;margin-right: -1px;padding-top: 19px;padding-bottom: 10px;">Lastname</td>';
	echo'<td  style="padding-left: 35px;margin-right: -1px; width: 43%;padding-top: 19px;padding-bottom: 10px;">Email-Id</td>';
	echo'<td  style="padding-left: 35px;margin-right: -1px; width: 43%;padding-top: 19px;padding-bottom: 10px;">Role</td>';
	echo'</tr>';
	
	for($i=0;$i<$num;$i++)
	{
	?>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<?php
	echo'<tr style="background-color: ghostwhite;">';
	echo'<td style="padding: 0px 16px;font-size: 16px;padding-right: 52px;font-family: sans-serif;color: #367fa9;">';
    echo'<input type="hidden" name="s[]" value="'.$email[$i].'">';
	echo'</td>';
	echo'<td style="padding: 10px 37px;font-size: 16px;font-family: sans-serif;color: #367fa9;">'.$firstName[$i].'</td>';
	echo'<td style="padding: 10px 37px;font-size: 16px;font-family: sans-serif;color: #367fa9;">'.$lastName[$i].'</td>';
	echo'<td style="padding: 10px 37px;font-size: 16px;font-family: sans-serif;color: #367fa9;">'.$email[$i].'</td>';
	//echo'<td style="padding: 10px 37px;font-size: 16px;font-family: sans-serif;color: lightsteelblue;">'.$role[$i].'</td>';
	echo'<td>';
	?>
	
	<select name="s[]" id="demo-success" onchange="this.form.submit()">
	<option <?php if($role[$i]=='user'){echo "selected=selected";} ?> value="user">user</option>
	<option <?php if($role[$i]=='admin'){echo "selected=selected";} ?> value="admin">admin</option>
	<option <?php if($role[$i]=='superadmin'){echo "selected=selected";} ?> value="superadmin">superadmin</option>
	<select>
	<?php
	echo'</tr>';
	echo'<br>';
	?>
	</form>
	<?php
	}
	
	?>
<?php
	$rows=mysql_num_rows(mysql_query("SELECT `firstname`, `lastname`, `email`,`role1` FROM `register1` where role1<>'superadmin'"));
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
  margin-left: 360px;'>";
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
	</div>
	<br>
	<br>
	<?php echo $paginate;
   ?>

	

	

 
 </div>
 </div>

<div id="responsecontainer" class="ss1" style="width:13%;float:left;height:auto;padding-left:34px;">
</div>
<br>
<br>

</div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
			<?php include "include/footer.inc"; ?>
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/plugins/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/plugins/AdminLTE/app.js" type="text/javascript"></script>
		 <link href="css/jquery.notify.css" type="text/css" rel="stylesheet" />
    
    <!--jQuery-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.notify.min.js"></script>
<script>
	   $(document).ready(function(e) {
	    $('select').on('change', function(){
                notify({
                    type: "success", //alert | success | error | warning | info
                    title: "Success",
					position: {
                        x: "right", //right | left | center
                        y: "top" //top | bottom | center
                    },
                    icon: '<img src="images/paper_plane.png" />',
                    message: "Role has been sucessfully changed."
                });
           });
		   });
		   </script>
		  
			  </html>
			  

    </body>
</html>