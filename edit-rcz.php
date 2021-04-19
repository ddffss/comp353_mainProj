<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php
    if(isset($_GET['edit'])) {
        $zip=$_GET['edit'];
        $query="SELECT * FROM ZoneLevels zl , ZoneMuni zm , Municipalities m WHERE zl.Deleted = 0 AND zm.Deleted = 0 AND m.Deleted = 0 AND zm.`﻿ZoneName` = zl.GroupZone AND zm.Municipality = m.City AND m.Zip LIKE '%$zip%'";
        $select_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_query)) {
            $region_zoneName = $row['GroupZone'];
            $region_city = $row['City'];
            $region_zip = $row['Zip'];
        }
    }

    if(isset($_POST['edit_region'])) {

        $region_zoneName = $_POST['zoneName'];
        $region_city = $_POST['city'];
        $region_zip = $_POST['zip'];

        $query = "UPDATE Municipalities SET ";
        $query .= "City ='{$region_city}', ";
        $query .= "Zip ='{$region_zip}' ";
        $query .="WHERE Zip LIKE '%$region_zip%'";

        $update_query = mysqli_query($connection, $query);

        if(!$update_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
        header("Location: regions.php");

    }

?>


<div container>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./edit-rcz.php" method="post" enctype="multipart/form-data">

                <div class="edit form-group">
                    <label for="zoneName">GroupZone</label>
                    <input type="text" name="zoneName" value="<?php echo  $region_zoneName; ?>">
                </div>

                <div class="edit form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" value="<?php echo $region_city; ?>">
                </div>

                <div class="edit form-group">
                    <label for="zip">Zip</label>
                    <input type="text" name="zip" value="<?php echo  $region_zip ; ?>">
                </div>

                <div class="edit form-group">
                    <input class="btn btn-primary" type="submit" name="edit_region" value="Update">
                </div>


            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>