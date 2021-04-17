<?php include "includes/db.php";?>


<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
        

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title"> List of Regions</h3>

        </div>

        <div class="col-6">
            <a class="add-function" href='./add-region.php'><i class="fa fa-plus"></i> Add Region</a>
        </div>
    </div>

            <table id="population">
                    <tr>
                    <th>Name</th>
                    <th>City</th>      
                    <th>Zip Code</th>
                    <th>Covid Positive</th>
                    <th>Covid Negative</th>
                    <th>Alert History</th>
                    <th>Current Alert</th>
                    <th>Actions</th>
                    </tr>

            <?php
                

                $query="SELECT * FROM ZoneLevels zl , ZoneMuni zm , Municipalities m WHERE zm.`﻿ZoneName` = zl.GroupZone AND zm.Municipality = m.City GROUP BY zl.GroupZone";

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_user_query)) {

                $db_name = $row['GroupZone'];
                $db_alert = $row['ZoneLevel'];
           
                echo "<tr>";
                echo "<td>{$db_name}</td>";
                echo "<td><ul>";

                $query_city="SELECT * FROM ZoneLevels zl , ZoneMuni zm , Municipalities m WHERE zm.`﻿ZoneName` = zl.GroupZone AND zm.Municipality = m.City AND zm.`﻿ZoneName` LIKE '%$db_name%' GROUP BY m.City";
                                
                // function below will pull out the result
                $select_region_query_city = (mysqli_query($connection, $query_city));
                if(!$select_region_query_city) {
                    die("QUERY FAILED". mysqli_error($connection));
                }
    
                    while($row = mysqli_fetch_array($select_region_query_city)){
    
                            $db_city = $row['City'];
    
                        echo "<li>{$db_city}</li>";
                    }
                
                echo "</ul></td>" ;

                echo "<td><ul>";

                $query_zip="SELECT * FROM ZoneLevels zl , ZoneMuni zm , Municipalities m WHERE zm.`﻿ZoneName` = zl.GroupZone AND zm.Municipality = m.City AND zm.`﻿ZoneName` LIKE '%$db_name%'";
                                
                // function below will pull out the result
                $select_region_query_zip = (mysqli_query($connection, $query_zip));
                if(!$select_region_query_zip) {
                    die("QUERY FAILED". mysqli_error($connection));
                }
    
                    while($row = mysqli_fetch_array($select_region_query_zip)){
    
                            $db_zip = $row['Zip'];
    
                        echo "<li>{$db_zip}</li>";
                    }
                
                echo "</ul></td>" ;

                $count_positive=0;
                $count_negative=0;
                echo "<td>$count_positive</td>" ;
                echo "<td>$count_negative</td>" ;
                echo "<td>History</td>" ;
                echo "<td>{$db_alert}</td>";

                echo "<td class='action'><a href='region-city-zip.php'>edit region</a> <br> <a href='edit-region-alert.php'>edit alert</a></td>";

                echo "</tr>";

            }

          ?>
    


            </table>   
</div>
    
<?php include "includes/footer.php";?>