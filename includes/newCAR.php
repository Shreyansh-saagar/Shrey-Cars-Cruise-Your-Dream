    
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
 
 
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>