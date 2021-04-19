<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php
    if(isset($_GET['edit'])) {
        $name=$_GET['edit'];
        // $query="SELECT * FROM ZoneLevels zl , ZoneMuni zm , Municipalities m WHERE zm.`﻿ZoneName` = zl.GroupZone AND zm.Municipality = m.City AND zm.`﻿ZoneName` LIKE '%$name%'";
        $query="SELECT * FROM ZoneLevels WHERE GroupZone LIKE '%$name%'";

        $select_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_query)) {

            $region_name = $row['GroupZone'];
            $region_alert = $row['ZoneLevel'];
        }
    }

    if(isset($_POST['edit_region'])) {

        $region_name = $_POST['name'];
        $region_alert = $_POST['alert'];

        $query = "UPDATE ZoneLevels SET ";
        $query .= "GroupZone ='{$region_name}', ";
        $query .= "ZoneLevel ='{$region_alert}' ";
        // $query .= "WHERE GroupZone LIKE '%$region_name%'";

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
            <form action="./edit-region-alert.php" method="post" enctype="multipart/form-data">

                 <div class="edit form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $region_name; ?>">
                </div>

                <div class="edit form-group">
                    <label for="alert">Alert Status</label>
                    <input type="text" name="alert" value="<?php echo  $region_alert ; ?>">
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