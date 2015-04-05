<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Visualization</title>
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
					$p=$_POST['email'];
					$sq="select email from `register1` where email='$p'";
					$rs=mysql_query($sq);
					$rs1=mysql_num_rows($rs);
					class registration1 {

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
					//If(isset($_REQUEST['button'])!='')
					//{

											
											   

											  /***email id varification***/
											  if (empty($_POST["email"])) {
												 $emailErr = "Email is required";
											   } else {
												 $email = test_input($_POST["email"]);
												 // check if e-mail address is well-formed
												 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
												   $emailErr = "Invalid email format"; 
												 }
												 if($rs1==0)
													{
													$emailErr= 'email dont exists';
													}
											   }
											   
													
												
											   
											   if (empty($_POST["password"])) {
												 $passwordErr = "password is required";
											   } else {
												 $password = test_input($_POST["password"]);
												 // check if e-mail address is well-formed
												if (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 8){
												   $passwordErr = "Invalid password"; 
												 }
											   }
											   
												if (empty($_POST["confirmpassword"])) {
												 $confirmpasswordErr = "password is required";
											   } else {
												 $confirmpassword = test_input($_POST["confirmpassword"]);
												 // check if e-mail address is well-formed
											   if ( $_POST['password'] != $_POST['confirmpassword']){
												   $confirmpasswordErr = "password do not match"; 
												 }
											   }


						
							//}

										if( $firstnameErr=="")
										{
										if( $lastnameErr=="")
										{
										if( $emailErr=="")
										{
										if( $contactErr=="")
										{
										if( $passwordErr=="")
										{
										if( $confirmpasswordErr=="")
										{
													$password=$_POST['password'];
													$pass=md5($password);
													$confirmpassword=$_POST['confirmpassword'];                  
													$conf=md5($confirmpassword);

													
													$sql="update register1 SET `password`='$pass', `confirmpassword`='$conf' where email='$p' ";
                                                    


													$res=mysql_query($sql);

													If(  $res)
													{
                                                       header("location:login.html");
													   
													 $message="password has been set";
													 echo"<script type='javascript'>alert($message);</script>";
													
													}
													Else
													{
													Echo "There is some problem in inserting record";
													}

										}
										}}}}}

					
					}
						function test_input($data) {
											   $data = trim($data);
											   $data = stripslashes($data);
											   $data = htmlspecialchars($data);
											   return $data;
										   }
					$_SESSION['can_access'] = true;

	   
	   ?>
	 
	    
	   
	   
        <div class="form-box" id="login-box">
            <div class="header">Change Password</div>
   <form name="registration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              
<!-- we will create registration.php after registration.html -->
<div class="body bg-gray">
<div id="hoverdiv"></div>
<table cellspacing="10" cellpadding="10" >
<?php echo $message;?>

<tr>
<td><input type="text" value="<?php echo $email;?>" name="email" class="form-control" placeholder="Email ID" style="width:297px;"><?php echo $emailErr;?></td>
</tr>


<tr>
<td><input type="password" value="<?php echo $password;?>" name="password" class="form-control" placeholder="Password" style="width:297px"><?php echo $passwordErr;?></td>
</tr>
<tr>
<td><input type="password" value="<?php echo $confirmpassword;?>" class="form-control" name="confirmpassword" placeholder="Confirm Password" style="width:297px;"><?php echo $confirmpasswordErr;?></td>
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