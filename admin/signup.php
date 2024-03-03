<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>


<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  admin(UserName,Password) VALUES(:uname,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':uname',$uname,PDO::PARAM_STR);
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


    <div class="container mt-5 mb-5 justify-content-center" id="loginform">
    <div class="card px-1 py-4">
        <div class="card-body">
            <h6 class="card-title mb-3">Signup</h6>
			<form method="post" name="signup" onSubmit="return valid();">
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Full Name" required="required">
						</div>
					</div>
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
			<p class="mb-2 text-decoration-none">Already have an account? <a href="index.php" data-toggle="modal" class="text-decoration-none" data-dismiss="modal">Login Here</a></p>
			
        </div>
    </div>
</div>



    <?php include('includes/footer.php')?>


    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--bootstrap-slider-JS--> 
    <script src="assets/js/bootstrap-slider.min.js"></script> 

</body>
</html>