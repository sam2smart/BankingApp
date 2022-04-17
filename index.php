

<!DOCTYPE html>
<html lang="en">

<?php include"head.php"; ?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php"><img src="assets/img/sun.png" style="width: 20%;"/></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
         
          <li><a class="getstarted scrollto" href="#get-started">Get Started</a></li>
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
          <h1>Florida’s Largest Credit Access</h1>
          <p>Suncoast Credit Union puts members first and enriches our local communities. We offer lower rates on loans, higher earnings on deposits and more free services so you can live your best life.</p>
        </div>
      </div>
      <div class="text-center">
        <a href="#get-started" class="btn-get-started scrollto">Get Started</a>
      </div>

      <div class="row icon-boxes">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title"><a href="">Business Planning</a></h4>
            <p class="description">Learn why having a business banking relationship is one of the best kept secrets to the growth of your business!</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title"><a href="">Banking Relation</a></h4>
            <p class="description">Learn all about the essentials you'll need to properly start your business.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title"><a href="">Rethinking Your Marketing for Success</a></h4>
            <p class="description">Learn how to rethink your marketing in order to build a better plan for success.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="ri-fingerprint-line"></i></div>
            <h4 class="title"><a href="">Security Assurance</a></h4>
            <p class="description">build a better plan for success, with well secure plans.</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
	
    <!-- ======= Contact Section ======= -->
    <section id="get-started" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Get Started with us</h2>
          <p>All our users with bank with us have opportunities to different opportunities and rewords here with us in our bank, they can take on different loans and also take different career jobs.</p>
        </div>
		
		  <!-- ======= Clients Section ======= -->
   
		
	<?php
	   if(isset($_GET['register'])){
				 
				 ?>
					 <section id="clients" class="clients section-bg">
					  <div class="container">

						<div class="row">
							<h2>Account Registered Successful.</h2>
							<p> Please you can proceed with LogIn</p>
						</div>

					  </div>
					</section><!-- End Clients Section -->
				 <?php
				 //echo "<script>alert('Registration successfully '); </script>";
				//echo "<script>window.open('home.php?pageload','_self')</script>";
			
			}
		
	?>
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Login With your:</h4>
                <p>Phone Or Email</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="inc/login.php" method="post" >
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="subject" placeholder="Enter Email" required>
              </div>
			  <div class="form-group mt-3">
                <input type="password" class="form-control" name="pass" id="subject" placeholder="Password" required>
              </div><br><br>
              
              <div class="text-center"><button type="submit" class="btn btn-primary" name="btn-login">LogIn</button></div>
            </form>
				<a href="register.php">Create an account</a>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once'footer.php'; ?>
 <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>