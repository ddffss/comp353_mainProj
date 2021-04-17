<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">

<?php
    // if(isset($_GET['edit'])) {
    //     $facility=$_GET['edit'];
    //     $query="SELECT * FROM PublicHealthWorker WHERE Name LIKE '$facility'";
    //     $select_query = mysqli_query($connection, $query);
    //     while($row = mysqli_fetch_assoc($select_query)) {

    //         $facility_name = $row['Name'];
    //         $facility_type = $row['CenterType'];
    //         $facility_phone = $row['Phone'];
    //         $facility_address = $row['Address'];
    //         $facility_city = $row['City'];
    //         $facility_province = $row['Province'];
    //         $facility_postalcode = $row['Postal Code'];
    //         $facility_website = $row['Website'];
    //     }


    // }

    // if(isset($_POST['edit_facility'])) {

    //     $facility_name = $_POST['name'];
    //     $facility_type = $_POST['centertype'];
    //     $facility_phone = $_POST['phone'];
    //     $facility_address = $_POST['address'];
    //     $facility_city = $_POST['city'];
    //     $facility_province = $_POST['province'];
    //     $facility_postalcode = $_POST['postalcode'];
    //     $facility_website = $_POST['website'];


    //     $query = "UPDATE PublicHealthCenter SET ";
    //     $query .= "Name ='{$facility_name}', ";
    //     $query .= "CenterType ='{ $facility_type}', ";
    //     $query .= "Phone ='{$facility_phone}' ";
    //     $query .= "Address ='{$facility_address}', ";
    //     $query .= "City ='{$facility_city}', ";
    //     $query .= "Province ='{$facility_province}' ";
    //     $query .= "PostalCode ='{$facility_postalcode}', ";
    //     $query .= "Website ='{$facility_website}', ";

    //     $query .="WHERE Name LIKE '%$facility%' "  ;
    //     $update_query = mysqli_query($connection, $query);

    //     if(!$update_query) {
    //         die('QUERY FAILED' . mysqli_error($connection));
    //     }
    //     header("Location: phfacilities.php");

    // }


if(isset($_POST['edit_facility'])) {

        $facility_name = $_POST['name'];
        $facility_type = $_POST['centertype'];
        $facility_phone = $_POST['phone'];
        $facility_address = $_POST['address'];
        $facility_city = $_POST['city'];
        $facility_province = $_POST['province'];
        $facility_postalcode = $_POST['postalcode'];
        $facility_website = $_POST['website'];


    $query = "INSERT INTO PublicHealthCenter(Name, Centertype, Phone, Address, City, Province, PostalCode, Website) ";
    $query .= "VALUES('{$facility_name}', '{$facility_type}','{$facility_phone}','{$facility_address}','{$facility_city}','{$facility_province}', '{$facility_postalcode}', '{$facility_website}')";

    $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_post_query);
    if(!$create_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    header("Location: phfacilities.php");

} 


?>
<div container>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./add-facility.php" method="post">

                <div class="add form-group">
                    <label for="medicare">Name</label>
                    <input type="text" name="name">
                </div>

                <div class="add form-group">
                    <label for="workfacility">Center Type</label>
                    <input type="text" name="centertype">
                </div>

                <div class="add form-group">
                    <label for="dob">Phone</label>
                    <input type="text" name="phone">
                </div>
                <div class="add form-group">
                    <label for="medicare">Address</label>
                    <input type="text" name="address">
                </div>

                <div class="add form-group">
                    <label for="City">City</label>
                    <input type="text" name="city">
                </div>

                <div class="add form-group">
                    <label for="medicare">Province</label>
                    <input type="text" name="province">
                </div>

                <div class="add form-group">
                    <label for="workfacility">Postal Code</label>
                    <input type="text" name="postalcode">
                </div>

                <div class="add form-group">
                    <label for="dob">Website</label>
                    <input type="text" name="website">
                </div>


                <div class="add form-group">
                    <input class="btn btn-primary" type="submit" name="edit_facility" value="Add Facility">
                </div>

            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>