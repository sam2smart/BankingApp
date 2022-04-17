<?php

session_start();
require_once("classUsers.php");
$reg = new USER();

	if($reg->is_loggedin()!="")
	{
		$reg->redirect('inc/home.php');
	}

	if(isset($_POST['btn-login']))
	{
		$fname = strip_tags($_POST['fname']);
		$lname = strip_tags($_POST['lname']);
		$phone = strip_tags($_POST['phone']);
		$umail = strip_tags($_POST['email']);
		$upass = strip_tags($_POST['pass']);
		
		
		try{
			
			$stmt = $reg->runQuery("SELECT Phone, Email FROM users WHERE Phone=:phone OR Email=:umail");
			$stmt->execute(array(':phone'=>$phone, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
						
			if($row['Phone']==$phone) {
				//echo "<script>alert('we are working here ooo'); </script>";
				$reg->redirect('../register.php?phone#get-started');
			}
			elseif($row['Email']==$umail)
			{
				//echo "<script>alert('we are working here ooo') </script>";
				$reg->redirect('../register.php?email#get-started');
			}
			else{
				$reg->register($fname,$lname,$phone,$umail,$upass);
				$reg->redirect('../index.php?register#get-started');
		  }
  
	}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
}

?>