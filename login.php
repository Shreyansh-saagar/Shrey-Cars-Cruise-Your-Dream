<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<?php
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	$_SESSION['login'] = $_POST['email'];
	$_SESSION['fname'] = $results->FullName;
	$currentpage = $_SERVER['REQUEST_URI'];
	
	// Assuming index.php is in the same directory as the current page
	$redirect_url = 'index.php';
	
	// Redirect to the index.php page
	echo "<script type='text/javascript'> document.location = '$redirect_url'; </script>";
	
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

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

<div class="container mt-5 mb-5 justify-content-center" id="loginform">
    <div class="card px-1 py-4">
        <div class="card-body">
            <h6 class="card-title mb-3">Signin</h6>
			<form method="post">
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email address*">
						</div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password*">
						</div>
					</div>
				</div>
				<div class="form-group mb-2">
                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
				</div>
			</form>
			<p class="mb-2 text-decoration-none">Don't have an account? <a href="signup.php" data-toggle="modal" class="text-decoration-none" data-dismiss="modal">Signup Here</a></p>
			
			<!-- <div class="d-flex">
			<a href="index.php" class="me-4 text-decoration-none">Home</a>
			<p class="me-4">|</p>
			<a href="carListing.php" class="text-decoration-none">Car Listing</a>
			</div> -->
			
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