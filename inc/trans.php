<?php
	session_start();
	require_once("classUsers.php");
	
	
	$auth_user = new USER();
	
	$userID = $_SESSION['user_session'];
	
	// Data from the database users
		$st = $auth_user->runQuery("SELECT * FROM users WHERE userID =:userID");
		$st->execute(array(":userID"=>$userID));
	
		$tRow=$st->fetch(PDO::FETCH_ASSOC);
		$myAcc = $tRow['accNum'];
		$otps = $tRow['otps'];
	    $Balls = $tRow['Ball'];
		
	if($Balls <= 5){
		$auth_user->redirect('home.php?lowBallance');
	}
	
	if(isset($_POST['btn-login']))
	{
		$amount = strip_tags($_POST['amount']);
		$accnum = strip_tags($_POST['accnum']);
		
		$_SESSION['amount'] = $amount;
		$_SESSION['accnum'] = $accnum;
		
	}
	
	$_SESSION['amount'];
	$_SESSION['accnum'];
		
	
	if(isset($_POST['session']))
	{
		
		$otpss = strip_tags($_POST['otp']);
		

		if($otpss == $otps)
		{
			$otp = $_POST['otp'];
			// Data comming from the form field html
			 $amount = $_SESSION['amount'];
			 $accnum = $_SESSION['accnum'];
			
			// We are fetching data from the receiver account
			$stmt = $auth_user->runQuery("SELECT * FROM users WHERE accNum =:accnum");
			$stmt->execute(array(":accnum"=>$accnum));
		
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			$userRow['Phone'];
			$pa = $userRow['accNum'];
			
			//checking if the users exist in the database (users)
			if(($pa) && ($stmt->rowCount() > 0)){
			
			$fname = $userRow['FirstName'];
			$lname = $userRow['LastName'];
			$phone = $userRow['Phone'];
			$umail = $userRow['Email'];
			$AccNum = $userRow['accNum'];
			
			// We are calling for the account ballance of the receiver
			$stm = $auth_user->runQuery("SELECT * FROM users WHERE accNum =:accnum");
			$stm->execute(array(":accnum"=>$accnum));
			
			$uRow=$stm->fetch(PDO::FETCH_ASSOC);
			$ba = $uRow['Ball'];
			$uRow['FirstName'];
			//echo "<script>alert('This fellow is not part of the system'); </script>";
			
			
			
			//===================================================================
			// Sender information from here
			
			//echo $myAcc = $_SESSION['accNum_session'];
			
			// We are calling for the account ballance of the user
			$sstm = $auth_user->runQuery("SELECT * FROM users WHERE accNum =:accnum");
			$sstm->execute(array(":accnum"=>$myAcc));
			
			$suRow=$sstm->fetch(PDO::FETCH_ASSOC);
			$sfname = $suRow['FirstName'];
			$slname = $suRow['LastName'];
			$sphone = $suRow['Phone'];
			$sumail = $suRow['Email'];
			
			// We are calling for the account ballance of the user
			$sstm = $auth_user->runQuery("SELECT * FROM users WHERE accNum =:saccnum");
			$sstm->execute(array(":saccnum"=>$myAcc));
			
			$auRow=$sstm->fetch(PDO::FETCH_ASSOC);
			
			$sba = $auRow['Ball'];
			//calculate withdrawall 
			$srBall = $sba - $amount;
			$sTreated = ("Pending");
			$sstate = "withdrawal";
			
			
			if($Balls <= 0){
				echo "<script>alert('Ballance too low than usual '); </script>";
				$auth_user->redirect('home.php?low');
				exit;
			}
			else{
			
				$rBall = $ba + $amount;
				$WtdrDate  = date("y-m-d h:i:sa");
				$Treated = ("Processing..");
				$tate = "Credited";
			//echo $sba;
				$auth_user->createData($fname,$lname,$phone,$umail,$accnum,$amount,$rBall,$WtdrDate,$Treated,$tate,$sfname,$slname,$sphone,$sumail,$myAcc,$srBall,$sTreated,$sstate);
				unset($amount,$rBall,$srBall);
				$auth_user->redirect('home.php?successfull');
			}
			}else{
				echo "<script>alert('This Account Number is not part of the system'); </script>";
				$auth_user->redirect('home.php?checkuser');
			}
		}else{
			$auth_user->redirect('home.php?otpError');
		}
	}
	
	
	
	
	
	
	?>
	
	
	
	
	<?php
	
	$user_id = $_SESSION['user_session'];
	//echo $user_id;
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE userID =:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
	
	
	$phone = $userRow['Phone'];
	$accNums = $userRow['accNum'];
/*
	$stmt1 = $auth_user->runQuery("SELECT * FROM vadate WHERE phone=:phone");
	$stmt1->execute(array(":phone"=>$phone));
	
	$vRow=$stmt1->fetch(PDO::FETCH_ASSOC);
	$vda = $vRow['vdate'];
	$vref = $vRow['ref'];
	*/
	
	
	//echo $vda;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OnePage Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <style>
	#cont{
		
	}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
	</div>
	</header>
   
	
	
	    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up" id="cont">

     
            <div class="box featured">
               <h3>Enter Token</h3>
          <p><?php echo $_SESSION['amount']; ?></p>
		  
		  <br><br>
		  <div class="col-lg-12">
			<!-- role="form" class="php-email-form" -->
            <form action="trans.php" method="post" >
              <div class="form-group mt-6">
                <input type="number" class="form-control" name="otp" id="subject" placeholder="Enter OTP" required>
              </div><br><br>
              <div class="text-center"><button type="submit" name="session" class="btn btn-primary">Transfer</button></div>
            </form>
          </div>
              <div class="btn-wrap">
				<p style="color: white;">Please contact the admin for OTP</p>
				<p style="color: white;">admin@gmail.com</p>
              </div>
            </div>


      </div>
    </section><!-- End Pricing Section -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>