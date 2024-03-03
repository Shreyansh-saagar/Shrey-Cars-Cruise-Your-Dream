<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhno = $_GET['vhno'];
$vhid=$_GET['vhid'];
$bookingno=mt_rand(100000000, 999999999);
$ret="SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
$query1 = $dbh -> prepare($ret);
$query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query1->bindParam(':vhno',$vhno, PDO::PARAM_STR);
$query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query1->bindParam(':todate',$todate,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);

if($query1->rowCount()==0)
{

$sql="INSERT INTO  tblbooking(BookingNumber,userEmail,VehicleId,VehicleNo,FromDate,ToDate,message,Status) VALUES(:bookingno,:useremail,:vhid,:vhno,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':bookingno',$bookingno,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':vhno',$vhno,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
 echo "<script type='text/javascript'> document.location = 'carListing.php'; </script>";
} }  else{
 echo "<script>alert('Car already booked for these days');</script>"; 
 echo "<script type='text/javascript'> document.location = 'carListing.php'; </script>";
}

}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal | car Detail</title>
<!--Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>
<?php include('includes/header.php');?>


<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicles.* from tblvehicles where tblvehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{ 
foreach($results as $result)
{
?>  
<div class="container py-5">
   <div class="row mb-4">
      <div class="lc-block text-center">
         <div editable="rich">
            <h4 class="fw-bold display-2"><?php echo htmlentities($result->VehiclesTitle);?></h4>
         </div>
      </div>
      <div class="lc-block text-center">
         <div editable="rich">
            <p class="lead"><?php echo htmlentities($result->VehiclesOverview);?></p>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6 col-lg-6 g-4">
         <div class="lc-block">
            <img class="img-fluid" src="admin/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" sizes="(max-width: 1080px) 100vw, 1080px" width="1080" height="768" alt="Photo by Alexander Mils" loading="lazy">
         </div>
         <!-- /lc-block -->
      </div>
      <div class="col-md-6 col-lg-6 g-4">
         <div class="lc-block">
            <img class="img-fluid" src="admin/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" sizes="(max-width: 1080px) 100vw, 1080px" width="1080" height="768" alt="Photo by Scott Webb" loading="lazy">
         </div>
         <!-- /lc-block -->
      </div>
      <div class="col-md-6 col-lg-6 g-4">
         <div class="lc-block">
            <img class="img-fluid" src="admin/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" sizes="(max-width: 1080px) 100vw, 1080px" width="1080" height="768" alt="Photo by Ed Leszczynskl" loading="lazy">
         </div>
         <!-- /lc-block -->
      </div>
      <div class="col-md-6 col-lg-6 g-4">
         <div class="lc-block">
            <img class="img-fluid" src="admin/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" width="1080" height="768" alt="Photo by Levi Midnight" loading="lazy">
         </div>
         <!-- /lc-block -->
      </div>
   </div>
</div> 

 
  
    
<div class="container">
	<div class="row">
		<div class="col-lg-2 col-sm-5 me-4 mb-4">
			<div class="lc-block">
				<h4 class="my-sm-3 mb-2">
					<span class="ms-2" editable="inline">₹<?php echo htmlentities($result->PricePerDay);?></span>
				</h4>
				<div editable="rich">
					<p>Price Per Day</p>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-sm-5 me-4 mb-4">
			<div class="lc-block">
				<h4 class="my-sm-3 mb-2">
					<span class="ms-2" editable="inline"><?php echo htmlentities($result->ModelYear);?></span>
				</h4>
				<div editable="rich">
					<p>Model</p>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-sm-5 me-4 mb-4">
			<div class="lc-block">
				<h4 class="my-sm-3 mb-2">
					<span class="ms-2" editable="inline"><?php echo htmlentities($result->FuelType);?></span>
				</h4>
				<div editable="rich">
					<p>Fuel Type</p>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-sm-5 me-4 mb-4">
			<div class="lc-block">
				<h4 class="my-sm-3 mb-2">
					<span class="ms-2" editable="inline"><?php echo htmlentities($result->VehicleNo);?></span>
				</h4>
				<div editable="rich">
					<p>Vehicle Number</p>
				</div>
			</div>
		</div>
        <div class="col-lg-2 col-sm-5 me-4 mb-4">
			<div class="lc-block">
				<h4 class="my-sm-3 mb-2">
					<span class="ms-2" editable="inline"><?php echo htmlentities($result->SeatingCapacity);?></span>
				</h4>
				<div editable="rich">
					<p>Seating Capacity</p>
				</div>
			</div>
		</div>
	</div>
</div>
 
 
<div class="container mt-5 mb-5 justify-content-center">
    <div class="card px-1 py-4">
        <div class="card-body">
            <h6 class="card-title mb-3">Book Ride</h6>
			<form method="post">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>From Date:</label>
							<input type="date" class="form-control" name="fromdate" placeholder="To Date" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>To Date:</label>
							<input type="date" class="form-control" name="todate" placeholder="To Date" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 mt-1">
						<div class="form-group">
							<textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
						</div>
					</div>
				</div>
				<?php if($_SESSION['login'])
				{?>
				<div class="form-group">
					<input type="submit" class="mt-1 btn bg-primary text-white"  name="submit" value="Book Now">
				</div>
				<?php } else { ?>
					<a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>
				<?php } ?>
			</form>
        </div>
    </div>
</div>
<?php }} ?>








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