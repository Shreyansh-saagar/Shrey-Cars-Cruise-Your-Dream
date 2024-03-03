 
  
    <nav class="navbar navbar-expand-lg navbar-light py-4">
	<div class="container-fluid">
		<a class="navbar-brand" href="https://library.livecanvas.com/sections/">
			<img class="img-fluid" src="assets\images\logo.png" alt="" width="54px" height="54px">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav_lc" aria-controls="nav_lc" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="nav_lc">
			<ul class="d-none d-lg-flex navbar-nav mx-auto my-3 my-lg-0 position-absolute top-50 start-50 translate-middle">
				<li class="nav-item me-4"><a class="nav-link" href="index.php">Home</a></li>
				<li class="nav-item me-4"><a class="nav-link" href="carListing.php">Car-Listings</a></li>
				<li class="nav-item me-4"><a class="nav-link" href="about.php">About Us</a></li>
				<li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
			</ul>
			<ul class="navbar-nav my-3 my-lg-0 d-lg-none">
                <li class="nav-item me-4"><a class="nav-link" href="index.php">Home</a></li>
				<li class="nav-item me-4"><a class="nav-link" href="carListing.php">Car-Listings</a></li>
				<li class="nav-item me-4"><a class="nav-link" href="about.php">About Us</a></li>
				<li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
			</ul>


            <?php   if(strlen($_SESSION['login'])==0) { ?>
                <div class="ms-lg-auto login_btn" ><a class="btn btn-outline-primary me-2" href="login.php" data-toggle="modal" data-dismiss="modal">Sign In</a><a class="btn btn-primary" href="signup.php">Sign Up</a></div>
            <?php }
            else{ ?>
                <div class=" ms-lg-auto"><a class="btn btn-outline-primary me-2" href="logout.php">Log Out </a></div>
            <?php } ?>
            
            
		</div>
	</div>
</nav>
 
            <?php if(strlen($_SESSION['login'])==0) { ?>
                <div></div>
            <?php }
            else{ ?>
                <?php include('includes/userNav.php');?>
            <?php } ?>
  