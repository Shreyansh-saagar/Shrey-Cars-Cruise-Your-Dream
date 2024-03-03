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


<!-- HEADER IMAGE --> 
<div class="d-flex min-vh-75 mt-2">
	<div class="container align-self-center">

		<div class="row justify-content-center">

			<div class="col-12 col-lg-8 col-xl-7 text-center">

				<div class="lc-block mb-2">
					<img class="img-fluid w-50 " alt="Photo by Sebastian Pichler" src="assets\images\logo.png">
				</div>
				<div class="lc-block mb-4">
					<div editable="rich">

						<h2>Start Your Journey, Discover Your Ride</h2>

						<p>Get ready to explore the roads and find your perfect ride with Shrey Cars. Whether it's a thrilling adventure or a leisurely cruise, we've got the vehicle for you. Begin your journey today and experience the freedom of the open road.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 

<?php include('includes/fullList.php'); ?>
  



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