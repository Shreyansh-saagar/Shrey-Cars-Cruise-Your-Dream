<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$name=$_POST['fullname'];
$mobileno=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$email=$_SESSION['login'];
$sql="update tblusers set FullName=:name,ContactNo=:mobileno,dob=:dob,Address=:adress,City=:city,Country=:country where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>

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



<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<div class="container mt-4">
    <div class="row text-center">
        <!-- Team item -->
        <div class="col-xl-3 col-sm-6 ">
            <div class="bg-white rounded shadow-sm py-5 px-4">
                <h5 class="mb-0"><?php echo htmlentities($result->FullName);?></h5><span class="small text-uppercase text-muted"><?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country);?></span>
                <p><?php echo htmlentities($result->Address);?></p>
            </div>
        </div><!-- End -->
    </div>
</div>



<div class="container mt-5 mb-5 justify-content-center">
    <div class="card px-1 py-4">
        <div class="card-body">
            <h6 class="card-title mb-3">General Setting</h6>
            <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
			<form method="post">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="my-1">Name:</label>
							<input type="text" class="form-control" name="fullname" placeholder="" value="<?php echo htmlentities($result->FullName);?>" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
                            <label class="control-label my-1">Email Address</label>
                            <input class="form-control white_bg" value="<?php echo htmlentities($result->EmailId);?>" name="emailid" id="email" type="email" required readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 mt-1">
						<div class="form-group">	
                            <label class="control-label my-1">Phone Number</label>
                            <input class="form-control white_bg" name="mobilenumber" value="<?php echo htmlentities($result->ContactNo);?>" id="phone-number" type="text" required>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12 mt-1">
						<div class="form-group">	
                            <label class="control-label my-1">Date of Birth&nbsp;(dd/mm/yyyy)</label>
                            <input class="form-control white_bg" value="<?php echo htmlentities($result->dob);?>" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="text" >
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12 mt-1">
						<div class="form-group">	
                            <label class="control-label my-1">Your Address</label>
                            <textarea class="form-control white_bg" name="address" rows="4" ><?php echo htmlentities($result->Address);?></textarea>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12 mt-1">
						<div class="form-group">	
                            <label class=" my-1 control-label">Country</label>
                            <input class="form-control white_bg"  id="country" name="country" value="<?php echo htmlentities($result->City);?>" type="text">
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-sm-12 mt-1">
						<div class="form-group">	
                            <label class=" my-1 control-label">City</label>
                            <input class="form-control white_bg" id="city" name="city" value="<?php echo htmlentities($result->City);?>" type="text">
						</div>
					</div>
				</div>
			<?php }} ?>
            <div class="form-group">
              <button type="submit" name="updateprofile" class=" my-2 btn btn-success">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>

			</form>
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

<?php } ?>