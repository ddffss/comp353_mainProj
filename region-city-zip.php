<?php include "includes/db.php";?>


<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
        

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title"> List of Regions</h3>

        </div>

        <div class="col-6">
            <a class="add-function" href='./add-rcz.php'><i class="fa fa-plus"></i> Add Region</a>
        </div>
    </div>

            <table id="population">
                    <tr>
                    <th>Name</th>
                    <th>City</th>      
                    <th>Zip Code</th>
                    <th>Alert Status</th>
                    <th>Actions</th>
                    </tr>

            <?php
                

                $query="SELECT * FROM ZoneLevels zl , ZoneMuni zm , Municipalities m WHERE zm.`﻿ZoneName` = zl.GroupZone AND zm.Municipality = m.City GROUP BY m.City ORDER BY zm.`﻿ZoneName` ASC";

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_user_query)) {

                $db_name = $row['GroupZone'];
                $db_city = $row['City'];
                $db_zip = $row['Zip'];
                $db_alert = $row['ZoneLevel'];
           
                   echo "<tr>";
                   echo "<td>{$db_name}</td>";
                   echo "<td>{$db_city}</td>";
                   echo "<td>{$db_zip}</td>";
                   echo "<td>{$db_alert}</td>";

                   echo "<td class=\"action\"> <a href='region-city-zip.php?delete={$db_zip}'><i class=\"fa fa-trash\"> </i></a> <a href='edit-rcz.php?edit={$db_zip}'><i class=\"fa fa-pencil\"> </i></a></td>";

                   echo "</tr>";
                }

          ?>
        
        <?php
            global $connection;

              if(isset($_GET['delete'])) {
                $zip = $_GET['delete'];
                $query_delete="DELETE FROM Municipalities WHERE Zip LIKE '$zip'";
                $check_query_delete = mysqli_query($connection, $query_delete);
                header("Location: region-city-zip.php");
              }
        ?>


            </table>   
</div>
    
<?php include "includes/footer.php";?>