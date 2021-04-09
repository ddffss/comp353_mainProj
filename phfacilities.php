<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
    <div class="row">
    <h3> List of Public Health Facilities </h3>

        <div class="col-1"></div>
        <div class="col-md-auto">
            <table id="population">
                    <tr>
                    <th>Name</th>
                    <th>Center Type</th>
                    <th>Testing Method</th>
                    <th>Drive Thru</th>
                    <th>Number of Employees</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>postal Code</th>
                    <th>Website</th>
                    <th>List of Employees</th>
                    </tr>

            <?php
                $query ="SELECT * FROM PublicHealthCenter";

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
                $db_province = $row['Province'];
                $db_postalcode = $row['PostalCode'];
                $db_website = $row['Website'];
                // $db_testingmethod = $row[''];
                ?>

                    <tr>
                    <td><?php echo $db_name; ?></td>
                    <td><?php echo $db_centertype; ?></td>
                    <td>Testing Method</td>
                    <td>Yes/No</td>
                    <td>Number of Employees</td>
                    <td><?php echo $db_phone; ?></td>
                    <td><?php echo $db_address; ?></td>
                    <td><?php echo $db_city; ?></td>
                    <td><?php echo $db_province; ?></td>
                    <td><?php echo $db_postalcode; ?></td>
                    <td><?php echo $db_website; ?></td>
                    <td><a href="./phworkers.php">List of Employees</a></td>

                    </tr> 

            <?php } ?>


            </table>   
        </div>
        <div class="col-1"></div>
    </div>
    
<?php include "includes/footer.php";?>