<!DOCTYPE html>
<?php
session_start();

// kill the page if the access variable doesn't exists
//            or if the access variable does exist but is not set to true
if(!isset($_SESSION['can_access']) || (isset($_SESSION['can_access']) && $_SESSION['can_access'] !== true)|| (isset($_SESSION['can_access']) &&isset($_SESSION['sadmin'])&& $_SESSION['sadmin'] !== true&&isset($_SESSION['admin'])&& $_SESSION['admin']!==true && isset($_SESSION['user'])&&$_SESSION['user']!==true)){
   die('You cannot directly access this page!'); // kill the page display error
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VISUALIZATION | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<style>
		@media only screen and (max-width: 500px) {
         .gridsize {
         width:50%;
       }
	    .footersize{
		width:100%;
	   }
	   }
		</style>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include "include/header.inc";?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "include/leftside.inc";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       <i> Makes</i>
                        <small><i>Life Easy</i></small>
                    </h1>
                    
                </section>
				
				
<?php
if(isset($_SESSION['can_access']) &&isset($_SESSION['sadmin'])&& $_SESSION['sadmin']== true)
{
	
              //  <!-- Main content -->
              echo'  <section class="content">';

                  //  <!-- Small boxes (Stat box) -->
                 echo'   <div class="row">';
				
                       echo' <div class="col-lg-3 col-xs-6">';
                          //  <!-- small box -->
                           echo' <div class="small-box bg-aqua">';
                               echo' <div class="inner">';
                                   echo' <h3>
                                        UPLOAD
                                    </h3>';
                                  echo'  <p>
                                        CSV File
                                    </p>';
                              echo'  </div>';
                               echo' <div class="icon">';
                                echo'    <i class="ion ion-bag"></i>';
                                echo'</div>';
                              echo'  <a href="upload.php" class="small-box-footer">';
                                  echo'  upload <i class="fa fa-arrow-circle-right"></i>';
                             echo'   </a>';
                           echo' </div>';
                       echo' </div><!-- ./col -->';
                       echo' <div class="col-lg-3 col-xs-6">';
                           // <!-- small box -->
                           echo' <div class="small-box bg-green">';
                               echo' <div class="inner">';
                                   echo' <h3>
                                        VIEW<sup style="font-size: 20px"></sup>
                                    </h3>';
                                   echo' <p>
                                       Uploaded File 
                                    </p>';
                               echo' </div>';
                              echo'  <div class="icon">';
                                    echo'<i class="ion ion-stats-bars"></i>';
                              echo'  </div>';
                               echo' <a href="viewupload.php" class="small-box-footer">';
                                 echo'   view <i class="fa fa-arrow-circle-right"></i>';
                             echo'   </a>';
                           echo' </div>';
                       echo' </div>'; //<!-- ./col -->
                        echo'<div class="col-lg-3 col-xs-6">';
                         echo'   <!-- small box -->';
                          echo'  <div class="small-box bg-yellow">';
                                echo'<div class="inner">';
                                    echo'<h3>
                                        Report
                                    </h3>';
                                   echo' <p>
                                        VIEW
                                   </p>';
                               echo' </div>';
                              echo' <div class="icon">';
                                   echo' <i class="ion ion-pie-graph "></i>';
                              echo'  </div>';
                              echo'  <a href="existing_visuals.php" class="small-box-footer">';
										echo'View<i class="fa fa-arrow-circle-right"></i>';
                               echo' </a>';
                           echo' </div>';
                       echo' </div>';//<!-- ./col -->
						 
						echo'<div class="col-lg-3 col-xs-6">';
                           // <!-- small box -->
                            echo'<div class="small-box bg-red">';
                                echo'<div class="inner">';
                                 echo'   <h3>
                                       Update
                                   </h3>';
                                   echo' <p>
                                        Role
                                    </p>';
                             echo'   </div>';
                               echo' <div class="icon">';
                                    echo'<i class="ion ion-person-add"></i>';
                               echo' </div>';
                               echo' <a href="change_role.php" class="small-box-footer">';
                               echo'     Check <i class="fa fa-arrow-circle-right"></i>';
                             echo'   </a>';
                            echo'</div>';
                        echo'</div>';//<!-- ./col -->";
}
						elseif(isset($_SESSION['can_access']) &&isset($_SESSION['admin'])&& $_SESSION['admin']== true)
						{
							 //  <!-- Main content -->
              echo'  <section class="content">';

                  //  <!-- Small boxes (Stat box) -->
                 echo'   <div class="row">';
				
                       echo' <div class="col-lg-3 col-xs-6">';
                          //  <!-- small box -->
                           echo' <div class="small-box bg-aqua">';
                               echo' <div class="inner">';
                                   echo' <h3>
                                        UPLOAD
                                    </h3>';
                                  echo'  <p>
                                        CSV File
                                    </p>';
                              echo'  </div>';
                               echo' <div class="icon">';
                                echo'    <i class="ion ion-bag"></i>';
                                echo'</div>';
                              echo'  <a href="upload.php" class="small-box-footer">';
                                  echo'  upload <i class="fa fa-arrow-circle-right"></i>';
                             echo'   </a>';
                           echo' </div>';
                       echo' </div><!-- ./col -->';
                       echo' <div class="col-lg-3 col-xs-6">';
                           // <!-- small box -->
                           echo' <div class="small-box bg-green">';
                               echo' <div class="inner">';
                                   echo' <h3>
                                        VIEW<sup style="font-size: 20px"></sup>
                                    </h3>';
                                   echo' <p>
                                       Uploaded File 
                                    </p>';
                               echo' </div>';
                              echo'  <div class="icon">';
                                    echo'<i class="ion ion-stats-bars"></i>';
                              echo'  </div>';
                               echo' <a href="viewupload.php" class="small-box-footer">';
                                 echo'   view <i class="fa fa-arrow-circle-right"></i>';
                             echo'   </a>';
                           echo' </div>';
                       echo' </div>'; //<!-- ./col -->
                        echo'<div class="col-lg-3 col-xs-6">';
                         echo'   <!-- small box -->';
                          echo'  <div class="small-box bg-yellow">';
                                echo'<div class="inner">';
                                    echo'<h3>
                                        Report
                                    </h3>';
                                   echo' <p>
                                        VIEW
                                   </p>';
                               echo' </div>';
                              echo' <div class="icon">';
                                   echo' <i class="ion ion-pie-graph "></i>';
                              echo'  </div>';
                              echo'  <a href="existing_visuals.php" class="small-box-footer">';
										echo'View<i class="fa fa-arrow-circle-right"></i>';
                               echo' </a>';
                           echo' </div>';
                       echo' </div>';//<!-- ./col -->
							
						}
						else if(isset($_SESSION['can_access']) &&isset($_SESSION['user'])&& $_SESSION['user']== true)
						{
			//  <!-- Main content -->
              echo'  <section class="content">';

                  //  <!-- Small boxes (Stat box) -->
                 echo'   <div class="row">';
				

                        echo'<div class="col-lg-3 col-xs-6">';
                         echo'   <!-- small box -->';
                          echo'  <div class="small-box bg-yellow">';
                                echo'<div class="inner">';
                                    echo'<h3>
                                        Report
                                    </h3>';
                                   echo' <p>
                                        VIEW
                                   </p>';
                               echo' </div>';
                              echo' <div class="icon">';
                                   echo' <i class="ion ion-pie-graph "></i>';
                              echo'  </div>';
                              echo'  <a href="existing_visuals.php" class="small-box-footer">';
										echo'View<i class="fa fa-arrow-circle-right"></i>';
                               echo' </a>';
                           echo' </div>';
                       echo' </div>';//<!-- ./col -->
					   
					   echo' <div class="col-lg-3 col-xs-6">';
                           echo'  <!-- small box -->';
                            echo' <div class="small-box bg-green">';
                             echo'    <div class="inner">';
                              echo'       <h3>';
                               echo'          Request<sup style="font-size: 20px"></sup>';
                               echo'      </h3>';
                                echo'     <p>';
                                 echo'       Report ';
                                 echo'    </p>';
                                 echo'</div>';
                                echo' <div class="icon">';
                                echo'     <i class="ion ion-stats-bars"></i>';
                                echo' </div>';
                                echo' <a href="req_mail.php" class="small-box-footer">';
                                echo'     Request <i class="fa fa-arrow-circle-right"></i>';
                                echo' </a>';
                            echo' </div>';
                        echo' </div>';
                       
                   
                   


					   
					   
						}
					
					?>
						

                      
                    <!-- Main row -->
                   

                </section><!-- /.content -->
				<div class=".col-lg-3 col-xs-6 gridsize">
                            <div class="box box-solid" style="width:153%;">
                                 <div class="box-header " style="box-shadow:inset 0 50px rgba(30, 118, 179, 1), inset 0 -15px 30px rgba(250, 230, 232, 0.4), 0 5px 10px rgba(39, 39, 65, 0.71);">
                                    <h3 class="box-title" style="color:white"><b>Interactive Visualization</b></h3>
                                </div><!-- /.box-header -->
								
                                <div class="box-body" style="box-shadow: inset 0 50px rgba(164, 200, 223, 1), inset 0 -15px 30px rgba(0,0,0,0.4), 0 5px 10px rgba(31, 119, 180, 1);">
                                     <table>
								   <tr class="row">
								   <td class=".col-lg-3 col-xs-6 gridsize">
                                    <img src="image/bubble.png" style="border-radius:6px;height:50%;width=50%;float:left;height:50%;width=50%;float:left;box-shadow: inset 0 50px rgba(255,255,255,0.2), inset 0 -15px 30px rgba(0,0,0,0.4), 0 5px 10px rgba(0,0,0,0.5);">
									</td>
									<td class=".col-lg-3 col-xs-6 gridsize">
									<p style="padding: 11px 1px 20px 20px;border-radius: 6px;margin-left: -41px;box-shadow: inset 0 50px rgba(255, 255, 255, 1), inset 0 -15px 30px rgba(255, 255, 255, 1), 0 5px 10px rgba(135, 135, 135, 1);"><b style="font-size:18px;color:blue;color: steelblue;font-family: cursive;font-style: italic;">Visualization: Representation of data in pictorial or graphical format.</b><br>
								     <i style="color:red;">*</i><b style="color: coral;font-family: inherit;" > Visualization convey information in a universal manner and make it simple to share ideas with others.<br>
									 Even when data volumes are large patterns can be spotted quickly and easily.<br> 
									 Interactive visualization goes one step further- moving beyond the display<br> of static graphics and spreadsheets
                                     to using computer devices to drill down into charts and details,and interactively.	<br>								 
                                     </b> </p>
                                      </td>
									
									</tr>
									</table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
            </aside><!-- /.right-side -->
        <br>
		<br>
		<br>
		<br>
		<br>
		 <br>
		<br>
		<br>
		<br>
		<br> <br>
		<br>
		<br>
		<br>
		<br> <br>
		<br>
		
		<?php include "include/footer.inc"; ?>
		</div>

    </body>
</html>