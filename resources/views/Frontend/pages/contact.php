<?php
    session_start();

    require('header.blade.php');
?>
		<!-- page banner section -->
		<section class="page-banner contact-banner">
			<div class="container">
				<div class="row">
					<div class="page-banner-text whitecolor text-center">
						<h1>Contact Us</h1>
						<p>Describe your requirement and give the chance to walk together. And Don't be hesitated to send a message <br> we are friendly to keep in touch with you.</p>
					</div>
					<!-- page banner bottom -->
					<div class="page-banner-bottom color-bg">
						<ul class="bread-crumb">
							<li><i class="fas fa-home"></i><a href="index.html">Home</a></li>
							<li>Contact Us</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- // end page banner section -->

		<!-- contact us section -->
		<section class="contact-section grey-bg">
			<div class="container">
				<div class="contact-box">
					<div class="row justify-content-center">
						<!-- heading -->
						<div class="col-12 col-lg-8 col-md-10">
							<div class="heading">
								<h2>Contact<span> Us</span></h2>
								<p>Fillup the form with the imagination of yours. We will make it true.</p>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- contact form -->
						<div class="col-12 col-lg-8">
							<div class="contact-form mr-lg-4">
								<form action="mail.php" method="post" id="contact-form">
									<div class="row">
										<div class="col-12 col-lg-6">
											<input type="text" name="name" placeholder="Your Name">
										</div>
										<div class="col-12 col-lg-6">
											<input type="email" name="email" placeholder="Your Email">
										</div>
										<div class="col-12">
											<input type="text" name="subject" placeholder="Subject">
										</div>
										<div class="col-12">
											<textarea name="message" placeholder="Write your message"></textarea>
										</div>
										<div class="col-12">
											<button type="submit" class="main-btn">Send</button>
										</div>
										<?php if(isset($_SESSION['mail_success'])){ ?>
										<div class="col-12 mt-4">
										    	<div class="alert alert-success" role="alert">
                                          Mail has successfuly sent!
                                        </div>
										</div>
										<?php }
										unset($_SESSION['mail_success']);
										?>
										<?php if(isset($_SESSION['mail_fail'])){ ?>
										<div class="col-12 mt-4">
										    	<div class="alert alert-danger" role="alert">
                                          Something is wrong! Please Try again.
                                        </div>
										</div>
										<?php }
										unset($_SESSION['mail_fail']);
										?>

									</div>
								</form>
							</div>
						</div>
						<!-- contact address -->
						<div class="col-12 col-lg-4 mt-5 mt-lg-0">
							<div class="contact-info">
								<h3>Our Address</h3>
								<p>You may also contact us. We are always with you</p>
								<!-- single contact -->
								<div class="single-contact">
									<div class="contact-line">
										<i class="fas fa-envelope"></i>
										<h4>Email Address</h4>
									</div>
									<span>familiarit.star@gmail.com</span>
									<span>alaminislam9172@gmail.com</span>
								</div>
								<!-- single contact -->
								<div class="single-contact">
									<div class="contact-line">
										<i class="fas fa-phone"></i>
										<h4>Phone Number</h4>
									</div>
									<span>+8801727900653</span>
									<span>+8801660026726</span>
								</div>
								<!-- single contact -->
								<div class="single-contact">
									<div class="contact-line">
										<i class="fas fa-map"></i>
										<h4>Our Location</h4>
									</div>
									<span>Mohammadpur, Dhaka, Bangladesh</span>
									<span>Sibgonj, Sylhet, Bangladesh</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- // end contact us section -->
		<?php
    require('footer.blade.php');
?>
