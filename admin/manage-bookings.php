<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Successfully Cancelled";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE tblbooking SET Status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Successfully Confirmed";
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
    <div class="container">
        <h5>All Bookings</h5>

    </div>

    <div class="container ">
        <?php $sql = "SELECT tblusers.FullName,tblusers.ContactNo ,tblvehicles.VehicleNo,tblvehicles.VehiclesTitle,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.VehicleId as vid,tblbooking.Status,tblbooking.id  from tblbooking join tblvehicles on tblvehicles.id=tblbooking.VehicleId join tblusers on tblusers.EmailId=tblbooking.userEmail ";
            $query = $dbh -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
        {?>	

        <div class="border p-4 rounded my-2">
            <div class="d-flex">
                <!-- <p class="me-2"><?php echo htmlentities($cnt);?> . </p> -->
                <h3><?php echo htmlentities($result->FullName);?></h3>
            </div>
            <div class="d-flex py-2">
                <p>Contact No.: <?php echo htmlentities($result->ContactNo);?></p>
            </div>
            
            <div class="d-flex ">
                <p class="me-4">
                    <b>
                    Vehicle Booked: 
                    </b>
                     <a class="" href="edit-vehical.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->VehiclesTitle);?> </a>
                </p>
                <p class="me-4">
                    |
                </p>
                <p>
                 Vehicle Number: <?php echo htmlentities($result->VehicleNo);?>
                </p>
            </div>
            <div class="d-flex ">
                <p class="me-4">
                    <b>
                    Ride Dates:
                    </b>
                </p>
                <p>From: <?php echo htmlentities($result->FromDate);?> - To: <?php echo htmlentities($result->ToDate);?></p>
            </div>
            <div class="d-flex ">
                <p>
                    <b>Client Message:</b> <?php echo htmlentities($result->message);?>
                </p>
            </div>
            <div class="d-flex">
            <?php 
                if($result->Status==0)
                {
                echo htmlentities('Status: Not Confirmed yet');
                } else if ($result->Status==1) {
                echo htmlentities('Status: Confirmed');
                }
                else{
                    echo htmlentities('Status: Cancelled');
                }?>
            </div>
            <div class="d-flex py-2">
                <a class="bg-success py-1 px-2 rounded text-white text-decoration-none me-4" href="manage-bookings.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm this booking')"> Confirm</a>
                <a class="bg-danger py-1 px-2 text-white text-decoration-none rounded me-4" href="manage-bookings.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a>
            </div>
        </div>
        <?php $cnt=$cnt+1; }} ?>
    </div>







    <?php include('includes/footer.php')?>


<script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 

</body>
</html>
<?php } ?>