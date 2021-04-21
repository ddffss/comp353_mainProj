<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

<?php
  
    if(isset($_GET['edit'])) {
        $region_id=$_GET['edit'];
        $query="SELECT * FROM ZoneLevels WHERE zoneID LIKE '%$region_id%'";

        $select_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_query)) {

            $region_name = $row['GroupZone'];
            $region_alert = $row['ZoneLevel'];
            $region_id = $row['zoneID'];
        }
  }


    if(isset($_POST['edit_region'])) {

        $region_name = $_POST['name'];
        $region_alert = $_POST['alert'];
        $region_id = $_POST['zoneID'];

    
        $query = "UPDATE ZoneLevels SET ";
        $query .= "`GroupZone` ='{$region_name}', ";
        $query .= "ZoneLevel ='{$region_alert}' ";
        $query .= "WHERE zoneID LIKE '%$region_id%'";

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


                <!-- <div class="edit form-group" style="display:none;"> -->

                 <div class="edit form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $region_name; ?>">
                </div>

                <div class="edit form-group">
                    <label for="alert">Alert Status</label>
                    <select name="alert" id="alert">
                    <?php 
                            if($region_alert =='1') {
                                echo "<option value=1>1</option>";
                                echo "<option value=2>2</option>";
                            }
                            else if($region_alert =='2') {
                                echo "<option value=2>2</option>";
                                echo "<option value=1>1</option>";
                                echo "<option value=3>3</option>";
                            }
                            else if($region_alert =='3') {
                                echo "<option value=3>3</option>";
                                echo "<option value=2>2</option>";
                                echo "<option value=4>4</option>";
                            }
                            else if($region_alert =='4') {
                                echo "<option value=4>4</option>";
                                echo "<option value=3>3</option>";
                            }
                            ?>
                    </select>                  
                </div>

                <div class="edit form-group">
                    <input class="btn btn-primary" type="submit" name="edit_region" value="Update">
                </div>

                <div class="edit form-group" style="display:none;">
                    <label for="zoneID">ID</label>
                    <input type="text" name="zoneID" value="<?php echo $region_id; ?>">
                </div>


            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>