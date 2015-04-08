<?php
session_start();

// kill the page if the access variable doesn't exists
//            or if the access variable does exist but is not set to true
if(!isset($_SESSION['can_access']) || (isset($_SESSION['can_access']) && $_SESSION['can_access'] !== true)|| (isset($_SESSION['can_access']) &&isset($_SESSION['sadmin'])&& $_SESSION['sadmin'] !== true&&isset($_SESSION['admin'])&& $_SESSION['admin']!==true && isset($_SESSION['user'])&&$_SESSION['user']!==true))
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
        <title>Visualization | dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>
<aside class="left-side sidebar-offcanvas ">                
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
Welcome <?php echo $_SESSION["user_email"]; ?>.<br> Click here to <a href="logout.php" target="_top" tite="Logout" style="color:black;">Logout.
<?php
}
?>

                            
                        </div>
                    </div>
                   <?php
					  if(isset($_SESSION['can_access']) &&isset($_SESSION['sadmin'])&& $_SESSION['sadmin']== true)
{
?>
                    <ul class="sidebar-menu">
                       <li class="active" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                          <a href="dashboard.php" target="_top" style="color:black;">
                              <i class="fa fa-dashboard"></i> <span>dashboard</span>
                          </a>
                        </li>
                        
                       <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                         <a href="upload.php" target="_top" style="color:black;">
                             <i class="fa fa-bar-chart-o"></i>
                           <span>Upload File</span>
                            <i class="fa fa-angle-left pull-right"></i>
                           </a>
                            
                        </li>
                       <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                      <a href="viewupload.php" target="_top" style="color:black;">
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
						<li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                         <a href="change_report_status.php"  target="_top" style="color:black;">
                              <i class="fa fa-edit"></i> <span>Change report status</span>
                              <i class="fa fa-angle-left pull-right"></i>
                           </a>
                            
                       </li>                       
                       
                    </ul>
                </section>
                
           </aside>
		   <?php
}

elseif(isset($_SESSION['can_access']) &&isset($_SESSION['admin'])&& $_SESSION['admin']== true)
						{ 
						?>
						
					<ul class="sidebar-menu">
                       <li class="active" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                          <a href="dashboard.php" target="_top" style="color:black;">
                             <i class="fa fa-dashboard"></i> <span>dashboard</span>
                         </a>
                       </li>
                        
                        <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                          <a href="upload.php" target="_top" style="color:black;">
                           <i class="fa fa-bar-chart-o"></i>
                             <span>Upload File</span>
                          <i class="fa fa-angle-left pull-right"></i>
                          </a>
                            
                       </li>
                       <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                       <a href="viewupload.php" target="_top" style="color:black;">
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
						 </ul>
                </section>
               
           </aside>
		   <?php
						}
						
						else if(isset($_SESSION['can_access']) &&isset($_SESSION['user'])&& $_SESSION['user']== true)
						{ 
						?>
					<ul class="sidebar-menu">
                        <li class="active" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                          <a href="dashboard.php" target="_top" style="color:black;">
                              <i class="fa fa-dashboard"></i> <span>dashboard</span>
                        </a>
                       </li>
						
						
					
                     <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                           <a href="existing_visuals.php" target="_top" style="color:black;">
                           <i class="fa fa-edit"></i> <span>View Report</span>
                           <i class="fa fa-angle-left pull-right"></i>
                          </a>
                            
                       </li>
					           
                        <li class="treeview" style="border-top: 1px solid #fff;border-bottom: 1px solid #dbdbdb;">
                                     
                       <a href="req_mail.php" target="_top" style="color:black;">
                                      
                         <i class="fa fa-edit"></i> <span>Report Request</span>
                                       
                      <i class="fa fa-angle-left pull-right"></i>
                                    
                        </a>
                            
                               
                       </li>
                       
						 </ul>
						
               </section>
                
            </aside>
					<?php	}
?>
			</html>
