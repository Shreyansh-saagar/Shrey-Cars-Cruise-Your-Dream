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


    <!-- Swipper -->
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
</head>
<body>
    
    <?php include('header.php')?>

    

    <div class="container py-6 mb-5"><!-- Slider main container -->
	<div class="swiper mySwiper-RANDOMID">
        <div class="swiper-wrapper "><!-- Slides -->
            <?php 
            $sql1 ="SELECT id from tblvehicles ";
            $query1 = $dbh -> prepare($sql1);;
            $query1->execute();
            $results1=$query1->fetchAll(PDO::FETCH_OBJ);
            $totalvehicle=$query1->rowCount();
            ?>
            <div class="swiper-slide h-100">
				<div class="card shadow mx-auto">
					<div class="card-body">
						<div class="card-body">
							<div class="lc-block mb-3">
								<div editable="rich">

									<h2 class="h5">Total: <?php echo htmlentities($totalvehicle);?></h2>

									<p>Listed Vehicals</p>
								</div>
							</div>
							<div class="lc-block">
								<a class="btn btn-primary" href="manage-vehicals.php" role="button">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        

            <?php 
            $sql2 ="SELECT id from tblbooking ";
            $query2= $dbh -> prepare($sql2);
            $query2->execute();
            $results2=$query2->fetchAll(PDO::FETCH_OBJ);
            $bookings=$query2->rowCount();
            ?>
            <div class="swiper-slide h-100">
				<div class="card shadow mx-auto">
					<div class="card-body">
						<div class="card-body">
							<div class="lc-block mb-3">
								<div editable="rich">

									<h2 class="h5">Total: <?php echo htmlentities($bookings);?></h2>

									<p>Total Bookings</p>
								</div>
							</div>
							<div class="lc-block">
								<a class="btn btn-primary" href="manage-bookings.php" role="button">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>


            <div class="swiper-slide h-100">
				<div class="card shadow mx-auto">
					<div class="card-body">
						<div class="card-body">
							<div class="lc-block mb-3">
								<div editable="rich">

									<h2 class="h5">? Need Help</h2>

									<p>Contact Us</p>
								</div>
							</div>
							<div class="lc-block">
								<a class="btn btn-primary" href="contact.php" role="button">View Details</a>
							</div>
						</div>
					</div>
				</div>
			</div>

            </div>
        <div class="swiper-pagination position-relative pt-5 bottom-0"></div>
        </div>
    </div>


    <?php include('includes/imageGallery.php')?>



    <?php include('includes/footer.php')?>


    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--bootstrap-slider-JS--> 
    <script src="assets/js/bootstrap-slider.min.js"></script> 

</body>
</html>
 <?php } ?>