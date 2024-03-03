<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$vehicletitle=$_POST['vehicletitle'];
$vehicleno=$_POST['vehicleno'];
$vehicleoverview=$_POST['vehicalorcview'];
$priceperday=$_POST['priceperday'];
$fueltype=$_POST['fueltype'];
$modelyear=$_POST['modelyear'];
$seatingcapacity=$_POST['seatingcapacity'];
$id=intval($_GET['id']);

$sql="update tblvehicles set VehiclesTitle=:vehicletitle,VehicleNo=:vehicleno,VehiclesOverview=:vehicleoverview,PricePerDay=:priceperday,FuelType=:fueltype,ModelYear=:modelyear,SeatingCapacity=:seatingcapacity where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':vehicleno',$vehicleno,PDO::PARAM_STR);
$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Data updated successfully";


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
        <h5>
            <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
        </h5>
        
        <div class=" rounded">
            
            <?php 
                $id=intval($_GET['id']);
                $sql ="SELECT tblvehicles.* from tblvehicles where tblvehicles.id=:id";
                $query = $dbh -> prepare($sql);
                $query-> bindParam(':id', $id, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
            {	?>

            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <h5>
                    Edit Vehicle:
                </h5>
                <p><b>Basic Details:</b></p>
                <div class="form-group d-flex my-2">
                    <label class="control-label w-25 ">Vehicle Title<span style="color:red">*</span></label>
                    <input type="text" name="vehicletitle" class="form-control " value="<?php echo htmlentities($result->VehiclesTitle)?>" required>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label w-25">Vehicle Overview<span style="color:red">*</span></label>
                    <textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->VehiclesOverview);?></textarea>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label w-25">Price Per Day(in INR)<span style="color:red">*</span></label>
                    <input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay);?>" required>
                </div>
                
                <div class="form-group d-flex my-2">
                    <label class="control-label me-2 w-25">Model Year<span style="color:red">*</span></label>
                    <input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->ModelYear);?>" required>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label me-2 w-25">Seating Cpacity<span style="color:red">*</span></label>
                    <input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity);?>" required>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label me-2 w-25">Car Number:<span style="color:red">*</span></label>
                    <input type="text" name="vehicleno" class="form-control" value="<?php echo htmlentities($result->VehicleNo);?>" required>
                </div>  
                
                
                <div class="form-group d-flex my-2">
                    <label class="control-label w-25">Select Fuel Type<span style="color:red">*</span></label>
                    <select class="mx-5 w-100  bg-black px-2 py-1 rounded text-white" name="fueltype" required>
                    <option value="<?php echo htmlentities($result->FuelType);?>"> <?php echo htmlentities($result->FuelType);?> </option>

                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="CNG">CNG</option>
                    </select>
                </div>
        </div>
    </div>
    <div class="container mt-4">
        <p><b>Vehicle Images:</b></p>
        <div class="border form-group d-flex">
            <div class="border p-2 m-1">
                <img src="vehicleimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000" class="mb-4">
                <!-- <a href="changeimage1.php?imgid=" class="px-2 py-1 bg-primary text-white rounded text-decoration-none">Change Image 1</a> -->
            </div>
            <div class="border p-2 m-1">
                <img src="vehicleimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000" class="mb-4">
                <!-- <a class="px-2 py-1 bg-primary text-white rounded text-decoration-none" href="changeimage2.php?imgid=">Change Image 2</a> -->
            </div>
            <div class="border p-2 m-1">
                <img src="vehicleimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000" class="mb-4">
                <!-- <a class="px-2 py-1 bg-primary text-white rounded text-decoration-none" href="changeimage3.php?imgid=">Change Image 3</a> -->

            </div>
            <div class="border p-2 m-1">
                <img src="vehicleimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000" class="mb-4">
                <!-- <a class="px-2 py-1 bg-primary text-white rounded text-decoration-none" href="changeimage4.php?imgid=">Change Image 4</a> -->

            </div>
        </div>
        <div class="form-group mb-4 d-flex">
            <button class="btn btn-primary px-2 py-1 me-5" name="submit" type="submit" style="margin-top:4%">Save changes</button>  
        </div>
        
    </div>
    </div>
    <?php }} ?>
    <div class="container form-group mb-4">
        <a href="manage-vehicals.php" class="bg-warning px-2 py-1 rounded text-decoration-none text-white">Go Back To Manage Vehicles</a>
    </div>
</form>
</div>
</div>




<?php include('includes/footer.php')?>


<script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 

</body>
</html>
<?php } ?>