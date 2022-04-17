<?php
	require_once("session.php");
	require_once("classUsers.php");
	
	
	$auth_user = new USER();
	
	$user_id = $_SESSION['user_session'];
	//echo $user_id;

	
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE userID =:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
		
	$accNums = $userRow['accNum'];
	
	
	// we are generating otp from here--------------------------------------------------------
	if(isset($_POST['btn-login']))
	{
		$otp = rand(0001,9999);
		$_SESSION['otp'] = $otp;
		$accnum = strip_tags($_POST['accnum']);
		
		$auth_user->updateOtp($accnum,$otp);
		//echo "<script>alert('OTP Generated successfully '); </script>";
		echo "<script>window.open('admin.php?otpg#generate','_self')</script>";
	}
	
	// We are creding users account from this function-------------------------------------------
	if(isset($_POST['price']))
	{
		// This from html field to credit users
		$am = strip_tags($_POST['amount']);
		$accnum = strip_tags($_POST['accnum']);
		
		
			$stmt = $auth_user->runQuery("SELECT * FROM users WHERE accNum =:accnum");
	$stmt->execute(array(":accnum"=>$accnum));
	
	$uRow=$stmt->fetch(PDO::FETCH_ASSOC);
		
	$fname = $uRow['FirstName'];
	$lname = $uRow['LastName'];
	$phone = $uRow['Phone'];
	$email = $uRow['Email'];
	$aBall = $uRow['Ball'];
		
		
		
		//This are the data from the database
		$amount = $aBall + $am;
		$treat = "Pending";
		$state = "Credited";
		
		$auth_user->updateBallance($fname,$lname,$phone,$email,$accnum,$amount,$am,$treat,$state);
		//echo "<script>alert('Account Credited successfully '); </script>";
		echo "<script>window.open('admin.php?deposit#depositing','_self')</script>";
	}
	

	//We are treating user request
	if(isset($_POST['save'])){
		$accNum = strip_tags($_POST['accNum']);
		$tret = strip_tags($_POST['tret']);
		
		
		//echo "<script> alert('Here we are working ');</script>";
		$auth_user->treating($accNum,$tret);
		echo "<script>window.open('#depositing','_self')</script>";
	}
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

       <a href="index.php"><img src="../assets/img/sun.png" style="width: 20%;"/></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#users">Users</a></li>
          <li><a class="nav-link scrollto" href="#history">History</a></li>
          <li><a class="nav-link scrollto" href="#generate">Generate OTP</a></li>
          <li><a class="nav-link scrollto" href="#depositing">Credit Account</a></li>
        
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
          <h1>YOU ARE WELCOME Admin</h1>
          <h2><?php echo $userRow['FirstName']." ".$userRow['LastName']; ?></h2>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

  
  
    <!-- ======= Contact Section ======= -->
    <section id="depositing" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Credit Account</h2>
          <p>Please credit your users account from this field.</p>
        </div>
		<?php
	   if(isset($_GET['deposit'])){
				 
				 ?>
					 <section id="clients" class="clients section-bg">
					  <div class="container">

						<div class="row">
							<h2>Account Credited successfully.</h2><br>
							<p>Ask User for confirmation.</p>
						</div>

					  </div>
					</section><!-- End Clients Section -->
				 <?php
				
			}
		
	?>
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Credit user account:</h4>
                <p>Send Money to them</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Imput User info</h4>
                <p>info@example.com</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
			<form action="" method="post" >
			 <div class="form-group mt-3">
                <input type="number" class="form-control" name="amount" id="subject" placeholder="Amount" required>
              </div><br>
			  <div class="form-group mt-3">
                <input type="number" class="form-control" name="accnum" id="subject" placeholder="Account Number" required>
              </div><br><br>
              <div class="text-center"><button type="submit" name="price" class="btn btn-primary">Credit</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

	
	
	
	
	
	
	
	 
    <!-- ======= Contact Section ======= -->
    <section id="generate" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Generate OTP</h2>
          <p>You can generate one time password for your client here.</p>
        </div>
		
		<?php
	   if(isset($_GET['otpg'])){
				 
				 ?>
					 <section id="clients" class="clients section-bg">
					  <div class="container">

						<div class="row">
							<h2>Copy your OTP here.</h2><br>
							<p><?php echo $_SESSION['otp']; ?></p>
						</div>

					  </div>
					</section><!-- End Clients Section -->
				 <?php
				
			}
		
	?>
        <div class="row mt-5">


          <div class="col-lg-8 mt-5 mt-lg-0">
			<form action="" method="post" >
			  <div class="form-group mt-3">
                <input type="number" class="form-control" name="accnum" id="subject" placeholder="Account Number" required>
              </div><br><br>
              <div class="text-center"><button type="submit" name="btn-login" class="btn btn-primary">Generate</button></div>
            </form>
          </div>
		  
		  
          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Get user account</h4>
                <p>Number to Generate OTP</p>
              </div>

              <div class="email">
                 <a href="#users"><i class="bi bi-arrow-down-short"></i></a>
                <h4>Copy the OTP</h4>
                <a href="#users"><p>From Users Details below</p></a>
              </div>

            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

	
	
	  <!-- ======= Contact Section ======= -->
    <section id="users" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Users Details</h2>
        </div>

        <div class="row mt-5">
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
						<th scope="col">O.T.P</th>
						<th scope="col">Account Ball</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				// Data from the database users
				$st = $auth_user->runQuery("SELECT * FROM users");
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
						<td scope='col'><?php echo $row['otps']; ?></th>
						<td scope='col'><?php echo $row['Ball']; ?></th>
					</tr>
					<?php 
				}
					?>
				</tbody>
			
			</table>
          

          <div class="col-lg-8 mt-5 mt-lg-0">

          </div>

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
						<th scope="col"></th>
						<th scope="col">Details</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				// Data from the database users
				$st = $auth_user->runQuery("SELECT * FROM transactions");
				$st->execute(array(":accNums"=>$accNums));
			
				//$tRow=$st->fetch(PDO::FETCH_ASSOC);
				//$myAcc = $tRow['accNum'];
				$i = 1;
				while($row=$st->fetch(PDO::FETCH_ASSOC))
				{
					?>
					<tr>
						<td scope='col'><?php echo $i++; ?></th>
						<td scope='col'><?php echo $row['FirstName']; ?></td>
						<td scope='col'><?php echo $row['LastName']; ?></td>
						<td scope='col'><?php echo $row['Phone']; ?></td>
						<td scope='col'><?php echo $row['Email']; ?></td>
						<td scope='col'><?php echo $row['accNum']; ?></th>
						<td scope='col'><?php echo $row['Ball']; ?></td>
						<td scope='col'><?php echo $row['WithDraw']; ?></td>
						<td scope='col'><?php echo $row['WtdrDate']; ?></td>
						<td scope='col'>
							<form method="post" action="">
								<input type="hidden" name="accNum" value="<?php echo $row['accNum']; ?>">
								<select name="tret" class="form-control">
									<option active><?php echo $row['Treated']; ?></option>
									<option >Pending</option>
									<option >Successful</option>
									
								</select>
						</td>
						<td>
								<button name="save" class="btn btn-primary" ><i class="bi bi-save"></i></div>
							</form>
							</td>
						<td scope='col'><?php echo $row['state']; ?></td>
					</tr>
					<?php 
				}
					?>
				</tbody>
			
			</table>
          

          <div class="col-lg-8 mt-5 mt-lg-0">

          </div>

        </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

	
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Suncoastaccess</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>


          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

  </footer><!-- End Footer -->

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