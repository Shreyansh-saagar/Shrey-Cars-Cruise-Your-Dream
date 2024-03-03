<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shrey Cars Admin Portal</title>

        <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 

</head>
<body>
    
    <?php include('header.php')?>


 
  
    <div class="container py-5">
	<div class="row min-vh-50 align-items-center justify-content-center">
		<div class="col-lg-9 col-xl-8 text-center bg-dark text-white p-5">
			<div class="lc-block mb-4">
				<div editable="rich">
					<h2 class="display-3 fw-bolder">Reach us</h2>
					<p>Need assistance? Reach out to us at our office! Our dedicated team is here to help<br/> you with all your car rental needs. Whether you have questions about our vehicles, need<br/> assistance with booking, or have any other inquiries, we're just a message away. Contact us<br/> today and let us make your car rental experience smooth and hassle-free!</p>

				</div>
			</div><!-- /lc-block -->
			<div class="lc-block mb-5">
				<a class="btn btn-lg btn-light" href="https://maps.app.goo.gl/5ea5Ka174vxVJcMCA" role="button">VIEW MAP</a>
			</div><!-- /lc-block -->
			<div class="lc-block border-top col-md-6 offset-md-3">
				<div editable="rich">
					<h2 class="fw-bolder"><br></h2>
				</div>
			</div>
			<div class="lc-block mb-4">
				<div editable="rich">
					<h2 class="fw-bolder">Working Hours</h2>
				</div>
			</div>
			<div class="lc-block">
				<div editable="rich">
					<p>Monday to Friday: 07:00 – 23:59</p>
					<p>Saturday to Sunday: 11:00 – 22:59</p>
				</div>
			</div><!-- /lc-block -->
		</div><!-- /col -->
	</div>
</div> 
 
  
    
    <?php include('includes/footer.php')?>


<script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 

</body>
</html>
<?php } ?>