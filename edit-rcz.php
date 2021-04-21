<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php
    $groupzonename=$_SESSION['groupzonename'];
    echo $groupzonename;
    if(isset($_GET['edit'])) {
        $zip=$_GET['edit'];
        $query="SELECT * FROM ZoneLevels zl , ZoneMuni zm , Municipalities m WHERE zl.Deleted = 0 AND zm.Deleted = 0 AND m.Deleted = 0 AND zm.`﻿ZoneName` = zl.GroupZone AND zm.Municipality = m.City AND m.Zip LIKE '%$zip%'";
        $select_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_query)) {
            $region_zonelevel = $row['ZoneLevel'];
            $region_zoneName = $row['GroupZone'];
            $region_city = $row['Municipality'];
            $region_zip = $row['Zip'];
        }
    }

    if(isset($_POST['edit_region'])) {

        $region_zonelevel = $_POST['zonelevel'];
        $region_zoneName = $_POST['zoneName'];
        $region_city = $_POST['city'];
        $region_zip = $_POST['zip'];

        $query1 = "UPDATE ZoneLevels SET ";
        $query1 .= "`GroupZone` ='{$region_zoneName}', ";
        $query1 .= "`ZoneLevel` ='{$region_zonelevel}' ";
        $query1 .="WHERE `GroupZone` LIKE '%$groupzonename%'";


        $query2 = "UPDATE ZoneMuni SET ";
        $query2 .= "`Municipality` ='{$region_city}', ";
        $query2 .= "`﻿ZoneName` ='{$region_zoneName}' ";
        $query2 .="WHERE `﻿ZoneName` LIKE '%$groupzonename%'";


        $query3 = "UPDATE Municipalities SET ";
        $query3 .= "City ='{$region_city}', ";
        $query3 .= "Zip ='{$region_zip}' ";
        $query3 .="WHERE Zip LIKE '%$region_zip%'";

        $update_query1 = mysqli_query($connection, $query1);
        $update_query2 = mysqli_query($connection, $query2);
        $update_query3 = mysqli_query($connection, $query3);


        if(!$update_query1) {
            die('QUERY1 FAILED' . mysqli_error($connection));
        }

        if(!$update_query2) {
            die('QUERY2 FAILED' . mysqli_error($connection));
        }

        if(!$update_query3) {
            die('QUERY3 FAILED' . mysqli_error($connection));
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
                    <label for="zonelevel">Zone Level</label>
                        <select name="zonelevel" id="facility">
                        <?php 
                            if($region_zonelevel =='1') {
                                echo "<option value=1>1</option>";
                                echo "<option value=2>2</option>";
                            }
                            else if($region_zonelevel =='2') {
                                echo "<option value=2>2</option>";
                                echo "<option value=1>1</option>";
                                echo "<option value=3>3</option>";
                            }
                            else if($region_zonelevel =='3') {
                                echo "<option value=3>3</option>";
                                echo "<option value=2>2</option>";
                                echo "<option value=4>4</option>";
                            }
                            else if($region_zonelevel =='4') {
                                echo "<option value=4>4</option>";
                                echo "<option value=3>3</option>";
                            }
                            ?>
                        </select>    
                <div>


                <div class="edit form-group">
                    <label for="zoneName">Zone Name</label>
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