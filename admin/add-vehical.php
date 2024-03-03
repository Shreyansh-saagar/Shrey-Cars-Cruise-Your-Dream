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
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"vehicleimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"vehicleimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"vehicleimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"vehicleimages/".$_FILES["img4"]["name"]);

$sql="INSERT INTO tblvehicles(VehiclesTitle,VehicleNo,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4) VALUES(:vehicletitle,:vehicleno,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4)";
$query = $dbh->prepare($sql);
$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':vehicleno',$vehicleno,PDO::PARAM_STR);
$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Vehicle posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
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

    <div class="container my-4">
        <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group d-flex my-2">
                    <label class="control-label w-25 ">Vehicle Title<span style="color:red">*</span></label>
                    <input type="text" name="vehicletitle" class="form-control " required>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label w-25">Vehicle Overview<span style="color:red">*</span></label>
                    <textarea class="form-control" name="vehicalorcview" rows="3" required></textarea>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label w-25">Price Per Day(in INR)<span style="color:red">*</span></label>
                    <input type="text" name="priceperday" class="form-control" required>
                </div>
                
                <div class="form-group d-flex my-2">
                    <label class="control-label me-2 w-25">Model Year<span style="color:red">*</span></label>
                    <input type="text" name="modelyear" class="form-control"  required>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label me-2 w-25">Seating Cpacity<span style="color:red">*</span></label>
                    <input type="number" name="seatingcapacity" class="form-control" required>
                </div>
                <div class="form-group d-flex my-2">
                    <label class="control-label me-2 w-25">Car Number:<span style="color:red">*</span></label>
                    <input type="text" name="vehicleno" class="form-control" required>
                </div>  
                
                
                <div class="form-group d-flex my-2">
                    <label class="control-label w-25 ">Select Fuel Type<span style="color:red">*</span></label>
                    <select class="mx-5 w-100 bg-black px-2 py-1 rounded text-white" name="fueltype" required>
                    <option value="">Select Fuel Type </option>

                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="CNG">CNG</option>
                    </select>
                </div>

                <p><b>Upload Images</b></p>
                <div class="form-group">
                <div class="col-sm-4 my-4">
                Image 1 <span style="color:red">*</span><input class="mx-2" type="file" name="img1" required>
                </div>
                <div class="col-sm-4 my-4">
                Image 2<span style="color:red">*</span><input class="mx-2" type="file" name="img2" required>
                </div>
                <div class="col-sm-4 my-4">
                Image 3<span style="color:red">*</span><input class="mx-2" type="file" name="img3" required>
                </div>
                <div class="col-sm-4 my-4">
                Image 4<span style="color:red">*</span><input class="mx-2" type="file" name="img4" required>
                </div>
                </div>


                <div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
					    <button class="btn btn-danger " type="reset">Cancel</button>
                        <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                    </div>
				</div>
        </form>

    </div>





    
    <?php include('includes/footer.php')?>


<script src="assets/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 

</body>
</html>
<?php } ?>