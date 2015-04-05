<?php
if(isset($_REQUEST['email_code']))
    {
	$email=$_REQUEST['email_code'];
    require_once 'registration1.php';
    $db = new registration1();
	 header("Location:forgot2.php");
	
	}

?>