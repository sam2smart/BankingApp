<?php
	require_once("session.php");
	require_once("classUsers.php");
	
	
	$auth_user = new USER();
	
	$user_id = $_SESSION['user_session'];
	//echo $user_id;
	
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE userID =:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
	$admin = $userRow['admin'];
	
	if($admin != ""){
	  $auth_user->redirect('admin.php');
	}
		
		
	
	
	$phone = $userRow['Phone'];
	$accNums = $userRow['accNum'];

	
	$myBall = $userRow['Ball'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Suncoastaccess</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/sun.png" rel="icon">
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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="home.php"><img src="../assets/img/sun.png" style="width: 20%;"/></a>
	  
	  <h5>Ball : <?php echo $myBall; ?></h5>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
         <li><a class="nav-link scrollto" href="#transfer">Transfer</a></li>
          <li><a class="nav-link scrollto" href="#history">History</a></li>
        
          <li><a class="getstarted scrollto" href="logout.php?logout=true">LogOut</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>YOU ARE WELCOME</h1>
          <h2><?php echo $userRow['FirstName']." ".$userRow['LastName']; ?></h2>
		  <h5>Acc Number: <?php echo $userRow['accNum']; ?></h5>
        </div>
      </div>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title"><a href="">Transfer</a></h4>
            <p class="description">Send money to client who is also using this platform any location in the world</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title"><a href="">Transaction history History</a></h4>
            <p class="description">Check number of transactions history</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title"><a href="">Profile Details</a></h4>
            <p class="description">Every thing about your information is here with us and safe</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="ri-fingerprint-line"></i></div>
            <h4 class="title"><a href="">Security</a></h4>
            <p class="description">Your security is sure with us in our bank here, trade more with us.</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
	<?php 
		if(isset($_GET['successfull'])){
			 echo "<script>alert('Transaction Went successfully '); </script>";
			echo "<script>window.open('home.php?pageload','_self')</script>";
		
		}
		else if(isset($_GET['checkuser'])){
			echo "<script>alert('Transaction Went successfully '); </script>";
			echo "<script>window.open('home.php?pageload','_self')</script>";
		}
		else if(isset($_GET['otpError'])){
			echo "<script>alert('Please call the admin for OTP '); </script>";
			echo "<script>window.open('home.php?pageload','_self')</script>";
		}
		else if(isset($_GET['lowBallance'])){
			echo "<script>alert('Your balance is too low '); </script>";
			echo "<script>window.open('home.php?pageload','_self')</script>";
		}
		
		if(isset($_GET['pageload'])){
			include_once('home.php');
		}
	?>

    <!-- ======= Contact Section ======= -->
    <section id="transfer" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Send Money to Cient</h2>
          <p>Take not of this enviroment you will be sending money to client from this field down.</p>
        </div>
	
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Amoun</h4>
                <p>Input amount you want to send to client</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
				<p><?php
					/*$length = 20; //the length
					$number = substr(md5(uniqid(microtime())),0,$length);
					echo $number;
					echo "<br>";*/
					
				?></p>
                <h4>Account Details</h4>
                <p>Input receiver details</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
			<!-- role="form" class="php-email-form" -->
            <form action="trans.php" method="post" >
              <div class="form-group mt-3">
                <input type="number" class="form-control" name="amount" id="subject" placeholder="Amount to Transfer" required>
              </div>
			  <div class="form-group mt-3">
                <input type="number" class="form-control" name="accnum" id="subject" placeholder="Account Number" required>
              </div><br> <br>
             
              <div class="text-center"><button type="submit" class="btn btn-primary" name="btn-login">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

	
	  <!-- ======= Contact Section ======= -->
    <section id="history" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Transaction History</h2>
        </div>

        <div class="row mt-5">
		 <div class="table-responsive">
			<div class="table-responsive-md">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">First</th>
						<th scope="col">Last</th>
						<th scope="col">Phone</th>
						<th scope="col">Email</th>
						<th scope="col">Account Number</th>
						<th scope="col">Account Ball</th>
						<th scope="col">Transactions</th>
						<th scope="col">Trans. Date</th>
						<th scope="col">Treated</th>
						<th scope="col">Details</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				// Data from the database users
				$st = $auth_user->runQuery("SELECT * FROM transactions WHERE accNum =:accNums");
				$st->execute(array(":accNums"=>$accNums));
			
				//$tRow=$st->fetch(PDO::FETCH_ASSOC);
				//$myAcc = $tRow['accNum'];
				$i = 1;
				while($row=$st->fetch(PDO::FETCH_ASSOC))
				{
					?>
					<tr>
						<td scope='col'><?php echo $i++; ?></th>
						<td scope='col'><?php echo $row['FirstName']; ?></th>
						<td scope='col'><?php echo $row['LastName']; ?></th>
						<td scope='col'><?php echo $row['Phone']; ?></th>
						<td scope='col'><?php echo $row['Email']; ?></th>
						<td scope='col'><?php echo $row['accNum']; ?></th>
						<td scope='col'><?php echo $row['Ball']; ?></th>
						<td scope='col'><?php echo $row['WithDraw']; ?></th>
						<td scope='col'><?php echo $row['WtdrDate']; ?></th>
						<td scope='col'><?php echo $row['Treated']; ?></th>
						<td scope='col'><?php echo $row['state']; ?></th>
					</tr>
					<?php 
				}
					?>
				</tbody>
			
			</table>
          </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

	
  </main><!-- End #main -->

 <?php include_once'footer.php'; ?>

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