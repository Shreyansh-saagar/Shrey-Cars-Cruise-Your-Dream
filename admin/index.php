<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

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
            <h6 class="card-title mb-3">Admin Sigin</h6>
			<form method="post">
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
                            <label for="" class=" text-sm">Your Username </label>
							<input type="text" placeholder="Username" name="username" class="form-control mb">
						</div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-sm-12">
						<div class="form-group">
                            <label for="" class="text-sm">Password</label>
							<input type="password" placeholder="Password" name="password" class="form-control mb">
						</div>
					</div>
				</div>
				<div class="form-group mb-2">
                    <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
				</div>
			</form>
			<!--<p class="mb-2 text-decoration-none">Don't have an account? <a href="signup.php" data-toggle="modal" class="text-decoration-none" data-dismiss="modal">Signup</a></p>-->
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
 
  