<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Visualization | Forgot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		<style>
		.d{
		border-radius: 5px;
        border-style: outset;
        border-color: green;
        padding: 2px 3px 4px 5px;}
		
		</style>
    </head>
    <body class="bg-black">

	   <?php
	   $firstnameErr = $emailErr = $contactErr =$lastnameErr= $passwordErr =$confirmpasswordErr= $message="";
$fname=$lname = $email = $contact = $password = $confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
					//include include/connect.php page for database connection
					Include('include/connect.php');
					//if submit is not blanked i.e. it is clicked.
														        $emailid=$_POST['email'];
																											
									        $spl="select `email` from `register1` where `email`='$emailid'";
											
					                        $rs2=mysql_query($spl);
									
					                        $rs3=mysql_num_rows($rs2);

									      
					class registration1{

						private $db;

						//put your code here
						// constructor
						function __construct() {
							require_once 'DB_include/connect.php';
							// connecting to database
							$this->db = new DB_Connect();
							$this->db->connect();
						}

						// destructor
						function __destruct() {
							
						}

					}
					
											  /***email id varification***/
											  if (empty($_POST["email"])) {
												 $emailErr = "Email is required";
											   } else {
												 $email = test_input($_POST["email"]);
												 // check if e-mail address is well-formed
												 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
												   $emailErr = "Invalid email format"; 
												 }
												 if($rs3==0)
													{
													$emailErr= 'email does not exists';
													}
											   }
											   
												
							//}

										if( $emailErr=="")
										{ 										   
									        $emailid=$_POST['email'];
									       $spl="select `email_code` from `register1` where `email`='$emailid'";
					                       $rs2=mysql_query($spl);
										   $pass=array();
									While($row=mysql_fetch_array($rs2))
									{
										$pass[0]=$row['email_code'];
									}
					                      
                                                    

												   $to = $emailid;
												    $headers = 'From: admin@gmail.com \r\n';
                                                    $subject = 'forgot paassword';
                                                    $message = "VISUALIZATION ACCOUNT,\n\n It seems like you forgot your password or want to reset it.\n Please Click on the below link to set new password.\n\n http://localhost/forgot1.php?email_code=" . $pass[0] ." \n\n Thank you.   ";
                                                   
                                                     $retval1=mail($to, $subject, $message, $headers);	
                                                     If( $retval1 == true && $rs3)
													{

													 $message="Email has been sent with email code.";
													 echo"<script type='javascript'>$message</script>";
													}
													Else
													{
													Echo "There is some problem error";
													}													 

										
										}}

					
					
						function test_input($data) {
											   $data = trim($data);
											   $data = stripslashes($data);
											   $data = htmlspecialchars($data);
											   return $data;
										   }
					$_SESSION['can_access'] = true;

	   
	   ?>
	 
	    
	   
	   
        <div class="form-box" id="login-box">
            <div class="header">Forgot Password</div>
   <form name="registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              
<!-- we will create registration.php after registration.html -->
<div class="body bg-gray">
<div id="hoverdiv"></div>
<table cellspacing="10" cellpadding="10" >
<font color="green">
<?php echo $message;?>
</font>
<tr>

<td><input type="text" value="<?php echo $email;?>"  name="email" placeholder="email" class="form-control" style="width:297px;"><font color="red"><?php echo $emailErr;?></font></td>
</tr>

<tr>

<td>
<input type="submit" name="button" value="submit" class="tn bg-olive btn-block"  style="padding: 6px 22px 7px 21px;">
</td>
</tr>
<table>
</div>
<br>

   <br>
        <a href="login.html" class="text-center" style="padding-left: 89px;">Go To The Login Page</a>
                </div>
            </form>

            <div class="margin text-center" style="display:none;">
                <span>Register using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>