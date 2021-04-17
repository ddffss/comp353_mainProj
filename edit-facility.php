<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">

<?php
    if(isset($_GET['edit'])) {
        $facility=$_GET['edit'];
        $query="SELECT * FROM PublicHealthCenter WHERE Name LIKE '$facility'";
        $select_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_query)) {

            $facility_name = $row['Name'];
            $facility_type = $row['CenterType'];
            $facility_phone = $row['Phone'];
            $facility_address = $row['Address'];
            $facility_city = $row['City'];
            $facility_province = $row['Province'];
            $facility_postalcode = $row['PostalCode'];
            $facility_website = $row['Website'];
        }


    }

    if(isset($_POST['edit_facility'])) {

        $facility_name = $_POST['name'];
        $facility_type = $_POST['centertype'];
        $facility_phone = $_POST['phone'];
        $facility_address = $_POST['address'];
        $facility_city = $_POST['city'];
        $facility_province = $_POST['province'];
        $facility_postalcode = $_POST['postalcode'];
        $facility_website = $_POST['website'];


        $query = "UPDATE PublicHealthCenter SET ";
        $query .= "Name ='{$facility_name}', ";
        $query .= "CenterType ='{$facility_type}', ";
        $query .= "Phone ='{$facility_phone}', ";
        $query .= "Address ='{$facility_address}', ";
        $query .= "City ='{$facility_city}', ";
        $query .= "Province ='{$facility_province}', ";
        $query .= "PostalCode ='{$facility_postalcode}', ";
        $query .= "Website ='{$facility_website}' ";
        $query .= "WHERE Name LIKE '%$facility_name%' "  ;
        $update_query = mysqli_query($connection, $query);
        echo $query;

        if(!$update_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
        header("Location: phfacilities.php");

    }



?>
<div container>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./edit-facility.php" method="post" enctype="multipart/form-data">

            <div class="edit form-group">
                    <label for="medicare">Name</label>
                    <input type="text" name="name" value="<?php echo  $facility_name; ?>">
                </div>

                <div class="edit form-group">
                    <label for="workfacility">Center Type</label>
                    <input type="text" name="centertype" value="<?php echo $facility_type; ?>">
                </div>

                <div class="edit form-group">
                    <label for="dob">Phone</label>
                    <input type="text" name="phone" value="<?php echo  $facility_phone;?>">
                </div>
                <div class="edit form-group">
                    <label for="medicare">Address</label>
                    <input type="text" name="address" value="<?php echo  $facility_address; ?>">
                </div>

                <div class="edit form-group">
                    <label for="City">City</label>
                    <input type="text" name="city" value="<?php echo $facility_city; ?>">
                </div>

                <div class="edit form-group">
                    <label for="medicare">Province</label>
                    <input type="text" name="province" value="<?php echo  $facility_province; ?>">
                </div>

                <div class="edit form-group">
                    <label for="workfacility">Postal Code</label>
                    <input type="text" name="postalcode" value="<?php echo   $facility_postalcode; ?>">
                </div>

                <div class="edit form-group">
                    <label for="dob">Website</label>
                    <input type="text" name="website" value="<?php echo $facility_website; ?>">
                </div>


                <div class="edit form-group">
                    <input class="btn btn-primary" type="submit" name="edit_facility" value="Update">
                </div>

            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>