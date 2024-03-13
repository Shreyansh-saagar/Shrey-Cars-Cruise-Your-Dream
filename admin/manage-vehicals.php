<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from tblvehicles  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Vehicle  record deleted successfully";
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


    <div class="container my-5 ">
        <h3>Manage Vehicals</h3>


        <?php 
        $ownerId = $_SESSION['ownerId'];
        $sql = "SELECT VehiclesTitle, VehicleNo, PricePerDay, FuelType, ModelYear, id FROM tblvehicles WHERE ownerId = :ownerId";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':ownerId', $ownerId, PDO::PARAM_INT);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {				?>	

        <div class="container border rounded mb-3 py-2">
            <div class="d-flex">
                <p class="me-2"><?php echo htmlentities($cnt);?> ></p> 
                <h5 class="text-black me-2"><?php echo htmlentities($result->VehiclesTitle);?> </h5>
            </div>
            <div class="d-flex">
                    <p class="me-2">
                        <b>Price Per Day:</b> <?php echo htmlentities($result->PricePerDay);?> |
                    </p>
                    <p class="me-2">
                        <b>Fuel Type:</b> <?php echo htmlentities($result->FuelType);?> | 
                    </p>
                    <p class="me-2">
                        <b>Model:</b> <?php echo htmlentities($result->ModelYear);?> | 
                    </p>
                    <p class="me-2"><b>Car No.:</b> <?php echo htmlentities($result->VehicleNo);?> </p>
            </div>
                    

                    <div class="flex">
                        <a href="edit-vehical.php?id=<?php echo $result->id;?> " class=" px-3 py-1 rounded bg-warning me-2 text-decoration-none text-white">Edit</a>
                        <a href="manage-vehicals.php?del=<?php echo $result->id;?>" class="px-3 py-1 rounded bg-danger text-decoration-none text-white" onclick="return confirm('Do you want to delete');">Delete</a>
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