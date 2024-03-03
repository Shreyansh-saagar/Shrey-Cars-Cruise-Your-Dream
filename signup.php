<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>


<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password) VALUES(:fname,:email,:mobile,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>


<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal</title>
<!--Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>


<div class="container mt-5 mb-5 justify-content-center" id="loginform">
    <div class="card px-1 py-4">
        <div class="card-body">
            <h6 class="card-title mb-3">Signup</h6>
			<form method="post" name="signup" onSubmit="return valid();">
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
						</div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required">
						</div>
					</div>
				</div>
				<div class="form-group mb-2">
					<input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
					<span id="user-availability-status" style="font-size:12px;"></span>
				</div>
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password" required="required">
						</div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
						</div>
					</div>
				</div>
				<div class="form-group mb-2">
                    <input type="submit" name="signup" value="Sign Up" class="btn btn-primary btn-block">
				</div>
			</form>
			<p class="mb-2 text-decoration-none">Already have an account? <a href="login.php" data-toggle="modal" class="text-decoration-none" data-dismiss="modal">Login Here</a></p>
			
			<div class="d-flex">
			<a href="index.php" class="me-4 text-decoration-none">Home</a>
			<p class="me-4">|</p>
			<a href="carListing.php" class="text-decoration-none">Car Listing</a>
			</div>
			
        </div>
    </div>
</div>


<!-- footer -->

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