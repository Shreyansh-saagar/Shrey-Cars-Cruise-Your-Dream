
<nav class="navbar navbar-expand-lg navbar-light py-4">
	<div class="container-fluid">
		<a class="navbar-brand" href="https://library.livecanvas.com/sections/">
			<img class="img-fluid" src="..\assets\images\logo.png" alt="" width="54px" height="54px">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav_lc" aria-controls="nav_lc" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="nav_lc">
			<ul class="navbar-nav my-3 my-lg-0 ms-lg-3 me-auto">
				<li class="nav-item me-4"><a class="nav-link" href="..\index.php">Shrey Cars</a></li>
				<li class="nav-item me-4"><a class="nav-link" href="add-vehical.php">Add Cars</a></li>
				<li class="nav-item me-4"><a class="nav-link" href="manage-vehicals.php">Manage Cars</a></li>
				<li class="nav-item me-4"><a class="nav-link" href="manage-bookings.php">All Bookings</a></li>
				<li class="nav-item me-4"><a class="nav-link" href='dashboard.php?ownerId=<?php echo $_SESSION['ownerId']; ?>'>Dashboard</a></li>
			</ul>
			<?php if(isset($_SESSION['alogin'])) { ?>
				<div><a class="btn btn-outline-danger me-2" href="logout.php">Logout</a></div>
			<?php } ?>
		</div>
	</div>
</nav>