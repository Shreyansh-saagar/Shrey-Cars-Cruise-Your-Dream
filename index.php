<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Shrey Cars</title>



<!-- For New Cars -->
<!-- lazily load the Swiper CSS file -->
<link rel="preload" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

<!-- lazily load the Swiper JS file -->
<script defer="defer" src="https://unpkg.com/swiper@8/swiper-bundle.min.js" onload="initializeSwiperRANDOMID();"></script>

<!-- lc-needs-hard-refresh -->

<script>
    	function initializeSwiperRANDOMID(){
        const swiper = new Swiper(".mySwiper-RANDOMID", {
            slidesPerView: 1,
            grabCursor: true,
            spaceBetween: 30,
            
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            },
        });
    }
</script>

<style>
	.mySwiper-RANDOMID .card {max-width:21rem}
</style>




<!--Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>
<?php include('includes/header.php');?>

<!-- BANNER -->
<div class="container-fluid pt-5">
	<div class="row mb-4 mb-lg-5 justify-content-lg-between">
		<div class="col-3 col-md-1 col-lg-2 d-none d-md-flex align-items-center">
			<div class="lc-block bg-dark ratio ratio-1x1 opacity-25" style=""> </div><!-- /lc-block -->
		</div><!-- /col -->
		<div class="col-4 col-md-3 col-lg-2 d-flex flex-column justify-content-between">
			<div class="lc-block bg-primary ratio ratio-1x1 opacity-25" style=""> </div><!-- /lc-block -->
			<div class="lc-block">
				<img class="img-fluid" src="https://i.pinimg.com/564x/ce/0b/a8/ce0ba84cd6de6b21659b15f048612640.jpg">
			</div><!-- /lc-block -->
		</div><!-- /col -->
		<div class="col-4 col-md-4 col-lg-3"> <img class="img-fluid" src="assets\images\car ban 1.jpg" style="object-fit:cover" alt="Photo by Simone Hutsch"></div><!-- /col -->
		<div class="col-4 col-md-3 col-lg-2 d-flex flex-column justify-content-between">
			<div class="lc-block">
				<img class="img-fluid" src="https://i.pinimg.com/564x/17/4d/a8/174da8198dfa020b8209b4d9f2a38524.jpg">
			</div><!-- /lc-block -->
			<div class="lc-block bg-primary ratio ratio-1x1 opacity-25" style=""> </div><!-- /lc-block -->
		</div><!-- /col -->
		<div class="col-3 col-md-1 col-lg-2 d-none d-md-flex  align-items-center">
			<div class="lc-block bg-dark ratio ratio-1x1 opacity-25" style=""> </div><!-- /lc-block -->
		</div><!-- /col -->
	</div>
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="lc-block text-center col-md-8">
			<div editable="rich">
				<h1 class="rfs-25 fw-bold">Cruise Your Dream</h1>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="lc-block text-center col-xxl-6 col-md-8">
			<div editable="rich">
				<p class="lead"> Shrey cars is India's fastest growing car rental platform with diverse range of vehicles for every occasion and emergencies.</p>
			</div>
		</div><!-- /lc-block -->
	</div>
</div>

<!-- NEW CARS -->
<div class=" my-4 text-center ">
    <h4 class="lh-lg bg-primary text-white">New Cars</h4>
</div>


<?php $sql = "SELECT tblvehicles.VehiclesTitle,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.VehicleNo,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles limit 6";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
?>

<div class="container py-6"><!-- Slider main container -->
	<div class="swiper mySwiper-RANDOMID">
        <div class="swiper-wrapper "><!-- Slides -->
<?php
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?> 
			<div class="swiper-slide h-100">
				<div class="card shadow mx-auto">
					<div class="card-body">
						<div class="lc-block">
							<img class="img-fluid" src="admin/vehicleimages/<?php echo $result->Vimage1; ?>" alt="Photo by Marla Gottschalk" loading="lazy" style="min-height:30vh;">
						</div>
						<div class="card-body">
							<div class="lc-block mb-3">
								<div editable="rich">

									<h2 class="h5"><?php echo htmlentities($result->VehiclesTitle);?></h2>

									<p><?php echo substr($result->VehiclesOverview,0,60);?></p>

                                    <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
                                    <li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
                                    </ul>
								</div>
							</div>
							<div class="lc-block">
								<a class="btn btn-primary" href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>&vhno=<?php echo htmlentities($result -> VehicleNo);;?>" role="button">Book Car</a>
							</div>


						</div>
					</div>
				</div>
			</div>
<?php }}?>
        </div>
    <div class="swiper-pagination position-relative pt-5 bottom-0"></div>
	</div>
</div>

<!-- How to book your ride -->
<div class="my-4 text-center ">
    <h4 class="lh-lg bg-primary text-white">How to book your ride?</h4>
</div>
<?php include('includes/howBook.php');?>

<!-- Company Numbers -->
<div class=" my-6 py-7">
	<div class="row rounded bg-primary bg-gradient text-center py-4 g-4 counter-RANDOMID text-white">
		<div class="col-6 col-lg-3"><span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0" data-end-at="5" data-time="5000" data-delay="60" data-format="{}"> </span>
			<p class="lead" editable="inline"><span><b>Experience</b></span> of Years</p>
		</div>
		<div class="col-6 col-lg-3"> <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0" data-end-at="55" data-time="5000" data-delay="60" data-format="{}"> +</span>
			<p class="lead" editable="inline"><b>Car</b> Count</p>
		</div>
		<div class="col-6 col-lg-3"> <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="0" data-end-at="4.5" data-time="5000" data-delay="60" data-format="{}"> </span>
			<p class="lead" editable="inline"><b>Average</b> Rating</p>
		</div>
		<div class="col-6 col-lg-3"> <span class="fw-bold display-5 mb-5" data-vanilla-counter="" data-start-at="5000" data-end-at="7000" data-time=".05" data-delay="0" data-format="{}"> +</span>
			<p class="lead" editable="inline"><b>Customers</b> Served</p>
		</div>
	</div>
</div>
 
<!-- Image Gallery -->
<?php include('includes/imageGallery.php'); ?>

<!-- footer -->
<?php include('includes/footer.php'); ?>

<?php include('includes/login.php'); ?>



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