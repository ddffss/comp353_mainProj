<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>

<div class="container">

    <div class="row"> 
        <div class="col-6">
           <h3 class="page-title"> List of Public Health Facilities </h3>
        </div>

        <div class="col-6">
        <a class="add-function" href='./add-facility.php'><i class="fa fa-plus"></i> Add Public Health Facility</a>
        </div>
    </div>


    <table class="facility-table">
        <tr>
        <th>Name</th>
        <th>Center Type</th>
        <th>Testing Method</th>
        <th>Drive Thru</th>
        <th>Number of Employees</th>
        <th>Phone</th>
        <th>Address</th>
        <!-- <th>City</th>
        <th>Province</th>
        <th>postal Code</th> -->
        <th>Website</th>
        <th>List of Employees</th>
        <th>Actions </th>
        </tr>

    <?php
        $query ="SELECT * FROM PublicHealthCenter WHERE Deleted = 0";

        // function below will pull out the result
        $select_user_query = (mysqli_query($connection, $query));
        if(!$select_user_query) {
            die("QUERY FAILED". mysqli_error($connection));
        }



        while($row = mysqli_fetch_array($select_user_query)) {

            $db_name = $row['Name'];
            $db_centertype = $row['CenterType'];
            $db_phone = $row['Phone'];
            $db_address = $row['Address'];
            $db_city = $row['City'];
            $db_testmethod = $row['TestMethod'];
            $drivethru = $row['DriveThru'];
            $db_province = $row['Province'];
            $db_postalcode = $row['PostalCode'];
            $db_website = $row['Website'];

            echo "<tr>";
            echo "<td>{$db_name}</td>";
            echo "<td>{$db_centertype}</td>";
            echo "<td>{$db_testmethod}</td>";
            echo "<td>{$drivethru}</td>";
            echo "<td>";
            ?>

            <?php
            $count=0;
            $db_name;
            $query_num_employees ="SELECT * FROM PublicHealthWorker WHERE WorkFacility LIKE '%$db_name%'";

            // function below will pull out the result
            $select_user_query_num_employees = (mysqli_query($connection, $query_num_employees));
            if(!$select_user_query_num_employees) {
                die("QUERY FAILED". mysqli_error($connection));
            }

                while($row = mysqli_fetch_array( $select_user_query_num_employees)){
                    $count++;
                }
                echo $count."</td>" ?>

                <?php
                echo "<td>{$db_phone}</td>";
                echo "<td>{$db_address} {$db_city} {$db_city} {$db_postalcode}</td>";
                // echo "<td>{$db_city}</td>";
                // echo "<td>{$db_city}</td>";
                // echo "<td>{$db_postalcode}</td>";
                echo "<td>{$db_website}</td>";
                echo "<td><ul>";
                ?>
            
            <?php 
            $count=0;
            $db_name;
            $query_employees ="SELECT * FROM PublicHealthWorker WHERE WorkFacility LIKE '%$db_name%'";

            // function below will pull out the result
            $select_user_query_employees = (mysqli_query($connection, $query_employees));
            if(!$select_user_query_employees) {
                die("QUERY FAILED". mysqli_error($connection));
            }

                while($row = mysqli_fetch_array($select_user_query_employees)){

                    $db_employeeName = $row['Medicare'];

                    echo "<li>{$db_employeeName}</li>";
                }
            
            echo "</ul></td>" ;
            echo "<td class=\"action\"><a href='phfacilities.php?delete={$db_name}'><i class=\"fa fa-trash\"></i></a> <a href='edit-facility.php?edit={$db_name}'><i class=\"fa fa-pencil\"> </i></a></td>";
            echo "</tr>";
        } 
        
            
    ?>


    <?php
        global $connection;

        if(isset($_GET['delete'])) {
            $facility=$_GET['delete'];
            $query_delete="DELETE FROM PublicHealthCenter WHERE Name LIKE '$facility'";
            $check_query_delete = mysqli_query($connection, $query_delete);
            header("Location: phfacilities.php");
        }
    ?>

    </table>  
    </div>

<?php include "includes/footer.php";?>