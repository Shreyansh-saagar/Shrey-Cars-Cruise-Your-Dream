<div class=" my-4 text-center ">
    <h4 class="lh-lg bg-primary text-white">All Cars</h4>
</div>


<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">
                <!-- list group item-->
<?php 
//Query for Listing count
$sql = "SELECT id from tblvehicles";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<?php $sql = "SELECT tblvehicles.* from tblvehicles";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3 ">
                        <div class="media-body order-2 order-lg-1 ">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo htmlentities($result->VehiclesTitle);?></h5>

                            <p class="font-italic text-muted mb-0 small">Seats: <?php echo htmlentities($result->SeatingCapacity);?> | Model: <?php echo htmlentities($result->ModelYear);?> | Vehical Number: <?php echo htmlentities($result->VehicleNo);?></p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2">₹<?php echo htmlentities($result->PricePerDay);?> Per Day</h6>
                                <div class="lc-block">
								<a class="btn btn-primary" href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>&vhno=<?php echo htmlentities($result -> VehicleNo);;?>" role="button">View Details</a>
							</div>
                            </div>
                        </div><img src="admin/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
<?php }} ?>

            </ul> <!-- End -->
        </div>
    </div>
</div>