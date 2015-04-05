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

                       
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
					</div>
					</div>
<?php 
					  if(isset($_SESSION['can_access']) &&isset($_SESSION['sadmin'])&& $_SESSION['sadmin']== true)
{
                  
                    echo '<ul class="sidebar-menu">';
                      echo'  <li class="active">';
                             echo'<a href="dashboard.php">';
                              echo'  <i class="fa fa-dashboard"></i> <span>dashboard</span>';
                            echo'</a>';
                        echo'</li>';
                        
                       echo' <li class="treeview">';
                        echo'    <a href="upload.php">';
                         echo'       <i class="fa fa-bar-chart-o"></i>';
                          echo'      <span>Upload File</span>';
                          echo'      <i class="fa fa-angle-left pull-right"></i>';
                          echo'  </a>';
                            
                      echo'  </li>';
                      echo'  <li class="treeview">';
                      echo'      <a href="viewupload.php">';
                       echo'         <i class="fa fa-laptop"></i>';
                       echo'         <span>View File</span>';
                        echo'        <i class="fa fa-angle-left pull-right"></i>';
                        echo'    </a>';
                            
                        echo'</li>';
                        echo'<li class="treeview">';
                        echo'    <a href="existing_visuals.php">';
                        echo'        <i class="fa fa-edit"></i> <span>View Report</span>';
                        echo'        <i class="fa fa-angle-left pull-right"></i>';
                        echo'    </a>';
                            
                       echo' </li>';
						
						echo'  <li class="treeview">';
                       echo'     <a href="change_role.php">';
                        echo'        <i class="fa fa-edit"></i> <span>Change role</span>';
                        echo'        <i class="fa fa-angle-left pull-right"></i>';
                         echo'   </a>';
                            
                       echo' </li>';
						
						echo'<li class="treeview">';
                         echo'   <a href="change_report_status.php">';
                         echo'       <i class="fa fa-edit"></i> <span>Change report status</span>';
                          echo'      <i class="fa fa-angle-left pull-right"></i>';
                         echo'   </a>';
                            
                       echo' </li>';
						
                       
                       
                   echo' </ul>';
				
               echo' </section>';
               
           echo' </aside>';
			}
			elseif(isset($_SESSION['can_access']) &&isset($_SESSION['admin'])&& $_SESSION['admin']== true)
						{ 
			
		echo'			<ul class="sidebar-menu">';
             echo'           <li class="active">';
                  echo'          <a href="dashboard.php">';
                       echo'         <i class="fa fa-dashboard"></i> <span>dashboard</span>';
                            echo'</a>';
                       echo' </li>';
                       
      echo'                  <li class="treeview">';
           echo'                 <a href="upload.php">';
                echo'                <i class="fa fa-bar-chart-o"></i>';
                     echo'           <span>Upload File</span>';
                          echo'      <i class="fa fa-angle-left pull-right"></i>';
 echo'                           </a>';
      echo'	               </li>';
                echo'        <li class="treeview">';
                     echo'       <a href="viewupload.php">';
                          echo'      <i class="fa fa-laptop"></i>';
                               echo' <span>View File</span>';
                          echo'      <i class="fa fa-angle-left pull-right"></i>';
                        echo'    </a>';
                            
                echo'        </li>';
                     echo'   <li class="treeview">';
                          echo'  <a href="existing_visuals.php">';
                               echo' <i class="fa fa-edit"></i> <span>View Report</span>';
                              echo'  <i class="fa fa-angle-left pull-right"></i>';
                         echo'   </a>';
                            
                   echo'     </li>';
				        
                       
                   echo' </ul>';
				
               echo' </section>';
               
           echo' </aside>';
						}
						else if(isset($_SESSION['can_access']) &&isset($_SESSION['user'])&& $_SESSION['user']== true)
						{ 
					
                    
					echo'<ul class="sidebar-menu">';
                        echo'<li class="active">';
                            echo'<a href="dashboard.php">';
                                echo'<i class="fa fa-dashboard"></i> <span>dashboard</span>';
                      echo'      </a>';
                        echo'</li>';
                       
                       echo' <li class="treeview">';
                       echo'     <a href="existing_visuals.php">';
                            echo'    <i class="fa fa-edit"></i> <span>View Report</span>';
                                echo'<i class="fa fa-angle-left pull-right"></i>';
                       echo'     </a>';
                            
                        echo'</li>';
						     
                       echo' <li class="treeview">';
						     
                          echo'  <a href="req_mail.php">';
						     
                           echo'     <i class="fa fa-edit"></i> <span>Report Request</span>';
						     
                            echo'    <i class="fa fa-angle-left pull-right"></i>';
						     
                          echo'  </a>';
						     
                            
                       echo' </li>';
						     
                       
                   echo' </ul>';
				
               echo' </section>';
               
           echo' </aside>';
		   }
						?>