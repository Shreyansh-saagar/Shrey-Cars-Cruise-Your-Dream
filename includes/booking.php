<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">

<?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.VehicleNo,tblvehicles.id as vid,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id  where tblbooking.userEmail=:useremail order by tblbooking.id desc";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

<li class="list-group-item">
                    <h4 style="color:red">Booking No #<?php echo htmlentities($result->BookingNumber);?></h4>
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3 ">
                        <div class="media-body order-2 order-lg-1 ">
                            <div class="d-flex">
                                <img src="admin/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                            </div>
                            <div class=" mt-2 d-flex justify-content-between">
                                <h5 class="mt-0 font-weight-bold mb-2"> <?php echo htmlentities($result->VehiclesTitle);?></h5>
                                <?php if($result->Status==1)
                                                { ?>
                                <div class="vehicle_status"> <a href="#" class="bg-success text-light btn outline btn-xs active-btn">Confirmed</a>
                                                        <div class="clearfix"></div>
                                </div>

                                <?php } else if($result->Status==2) { ?>
                                    <div class="vehicle_status mx-2"> <a href="#" class="bg-danger text-light btn outline btn-xs">Cancelled</a>
                                            <div class="clearfix"></div>
                                </div>
                                <?php } else { ?>
                                <div class=" mx-2 vehicle_status"> <a href="#" class="btn bg-warning-subtle outline btn-xs">Not Confirm yet</a>
                                <div class="clearfix"></div>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="">
                            <p><b>From </b> <?php echo htmlentities($result->FromDate);?> <b>To </b> <?php echo htmlentities($result->ToDate);?></p>

                            <p><b>Message:</b> <?php echo htmlentities($result->message);?> </p>
                            </div>
                            <hr>
                            <div class="container">
                                <h5 class="text-primary">Invoice</h5>

                                <p>
                                    <b>Car Name:</b> <?php echo htmlentities($result->VehiclesTitle);?>
                                </p>
                                <p>
                                <p>
                                    <b>Vehicle Number:</b> <?php echo htmlentities($result->VehicleNo);?>
                                </p>
                                </p>
                                <p>
                                    <b>From:</b> <?php echo htmlentities($result->FromDate);?> - <b>To:</b> <?php echo htmlentities($result->ToDate);?></td>
                                </p>

                                <p>
                                    <b>Total Days:</b> <?php echo htmlentities($tds=$result->totaldays);?> - <b>Rent Per Day:</b> <td class=""> <?php echo htmlentities($ppd=$result->PricePerDay);?></td>
                                </p>
                                <hr>
                                <p>
                                    <b>Total Rent:</b> <?php echo htmlentities($tds*$ppd);?>
                                </p>
                            </div>
                </li> <!-- End -->
<?php }} ?>

            </ul> <!-- End -->
        </div>
    </div>
</div>