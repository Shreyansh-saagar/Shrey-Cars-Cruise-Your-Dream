<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal</title>
<!--Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>
<?php include('includes/header.php');?>



 
  
<div class="container mt-5">
	<div class="row align-items-md-center mb-5">
		<div class="col-md-12">
			<div class="lc-block text-center">
				<h2 editable="inline" class="display-2 mb-0"><b>About the Company</b></h2>
				<p editable="inline">Explore Our Journey at Shrey Cars</p>
			</div><!-- /lc-block -->
		</div><!-- /col -->
	</div>
	<div class="row align-items-md-center mb-5">
		<div class="col-lg-6 pr-5">
			<div class="lc-block py-2">
				<span class="badge bg-primary" editable="inline">COMPANY INFO</span>
			</div>
			<div class="lc-block mb-4">
				<h2 editable="inline">Working Together, to build great network.</h2>
			</div>
			<div class="lc-block">


				<div class="row">
					<div class="col-6">
						<div class="lc-block mb-4">
							<p editable="inline" class=" m-0" style="font-size:40px;">3+</p>
							<p editable="inline" class="small text-uppercase">Branches</p>
						</div><!-- /lc-block -->
					</div>
					<div class="col-6">
						<div class="lc-block mb-4">
							<p editable="inline" class=" m-0" style="font-size:40px;">48+</p>
							<p editable="inline" class="small text-uppercase">Offices</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="lc-block mb-4">
							<p editable="inline" class=" m-0" style="font-size:40px;">33+</p>
							<p editable="inline" class="small text-uppercase">Vehicles</p>
						</div>
					</div>
					<div class="col-6">
						<div class="lc-block mb-4">
							<p editable="inline" class=" m-0" style="font-size:40px;">5000+</p>
							<p editable="inline" class="small text-uppercase">Customers</p>
						</div>
					</div>
				</div>
			</div>
			<div class="lc-block text-muted">
				<div editable="rich">
					<p> 
						At ShreyCars, our work culture is built on collaboration, innovation, and integrity. We foster an environment where every team member feels empowered to contribute ideas and drive growth in the transport industry. With a focus on continuous learning and professional development, we prioritize the well-being and success of our employees, ensuring they have the support and resources they need to excel in their roles.&nbsp;</p>
					<p>We believe in transparent communication, ethical conduct, and embracing new technologies to stay ahead in the ever-changing landscape of transportation. By nurturing a culture of teamwork and excellence, we aim to build strong relationships and networks within the industry, driving innovation and delivering exceptional service to our clients and partners.</p>
				</div>
			</div><!-- /lc-block -->
		</div>
		<div class="col-sm-6 col-lg-3 ">
			<div class="lc-block mb-4">
				<div class="card shadow-sm border-light">
					<img src="https://i.pinimg.com/564x/54/a4/81/54a4817f5a49cc262f1a2a00bc665317.jpg" alt="Featured image 1" class="card-img-top" loading="lazy">
					
				</div>
			</div>
			<div class="lc-block">
				<div class="card shadow-sm border-light">
					<img src="https://i.pinimg.com/564x/7f/be/ce/7fbece9716864bf46e51637b504a0c4b.jpg" alt="Featured image 2" class="card-img-top" loading="lazy">
					
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-3 mt-4 mt-sm-0 align-self-center">
			<div class="lc-block">
				<div class="card shadow-sm border-light">
					<img src="https://i.pinimg.com/564x/61/cd/9e/61cd9e0fd0175a7ae420dc0aa21a0f32.jpg" alt="Featured image 3" class="card-img-top" loading="lazy">
				
				</div>
			</div>
		</div>
	</div>
</div>
 
 
  








<!-- footer -->
<?php include('includes/footer.php'); ?>


<!-- Scripts --> 
<!-- company name -->
<script defer="" src="https://unpkg.com/vanilla-counter" onload="initializeCounterRANDOMID()"></script>
<!-- check info at https://github.com/yunisdev/vanilla-counter -->
<!-- lc-needs-hard-refresh -->


<script>
function initializeCounterRANDOMID(){
	 
	const options = {};
	
	const observer = new IntersectionObserver(function
	(entries, observer){
	    entries.forEach(entry => {
	        console.log(entry);
	         VanillaCounter();
	    });
	}, options);
	
	observer.observe(document.querySelector('.counter-RANDOMID'));
	 
}
</script>



<script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>