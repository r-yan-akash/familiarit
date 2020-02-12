<?php
    require('header.blade.php');
?>
<!-- page banner section -->
<section class="page-banner portfolio-banner">
	<div class="container">
		<div class="row">
			<div class="page-banner-text whitecolor text-center">
				<h1>Our Portfolio</h1>
				<p>Client imagination and our creation when became together we are avail to create a modern world. <br> Just have a look some of example.</p>
			</div>
			<!-- page banner bottom -->
			<div class="page-banner-bottom color-bg">
				<ul class="bread-crumb">
					<li><i class="fas fa-home"></i><a href="index.html">Home</a></li>
					<li>Portfolio</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- // end page banner section -->
<!-- portfolio section -->
<section class="portfolio-section equal-space">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8 col-md-10">
				<div class="heading">
					<h2><span>Our</span> Portfolio</h2>
					<p>See below for a selection of our latest client web design work.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<ul class="port-navigation wow fadeIn" data-wow-delay="0.4s">
					<li class="active" data-filter="*">All</li>
					<li data-filter=".design">Design</li>
					<li data-filter=".development">Development</li>
					<li data-filter=".app">Email</li>
					<li data-filter=".graphic">Bug Fixing</li>
				</ul>
			</div>
		</div>
		<div class="portfolio-list whitecolor">
			<div class="col-12 col-md-6 col-xl-3 single-port graphic design">
				<div class="work-wrap">
					<a href="https://bazna.netlify.com" target="_blank" class="work"
						style="background-image: url('assets/img/portfolios/bazna.jpg')">
					</a>
					<div class="hover-content d-flex justify-content-center">
						<a href="#" class="heart-react"><i class="far fa-heart"></i></a>
						<a href="#" class="live-demo">Live Demo</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl-3 single-port graphic">
				<div class="work-wrap">
					<a href="https://bazna.netlify.com" target="_blank" class="work bg-2"
						style="background-image: url('assets/img/portfolios/voker-2.jpg')"></a>
					<div class="hover-content d-flex justify-content-center">
						<a href="#" class="heart-react"><i class="far fa-heart"></i></a>
						<a href="#" class="live-demo">Live Demo</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl-3 single-port design">
				<div class="work-wrap">
					<a href="https://bazna.netlify.com" target="_blank" class="work bg-3"
						style="background-image: url('assets/img/portfolios/nolez.jpg')"></a>
					<div class="hover-content d-flex justify-content-center">
						<a href="#" class="heart-react"><i class="far fa-heart"></i></a>
						<a href="#" class="live-demo">Live Demo</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 col-xl-3 single-port graphic design">
				<div class="work-wrap">
					<a href="https://bazna.netlify.com" target="_blank" class="work bg-3"
						style="background-image: url('assets/img/portfolios/pizzaro.jpg')"></a>
					<div class="hover-content d-flex justify-content-center">
						<a href="#" class="heart-react"><i class="far fa-heart"></i></a>
						<a href="#" class="live-demo">Live Demo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- // end portfolio section -->
<?php
    require('footer.blade.php');
?>
