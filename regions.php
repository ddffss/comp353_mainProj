<?php include "includes/db.php";?>


<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
        

<div class="row">
        <div class="col-6">
        </div>

        <div class="col-6 peopleSearch">
            <form action="search-alerthistory.php" method="post">
                <input type="text" placeholder="Region Name..." name="regionname">
                <input type="date" placeholder="Start date..." name="start">
                <input type="date" placeholder="End date..." name="end">
                <button class="btn btn-primary" name="submit" type="submit">Search Alert History</button>
            </form>
        </div>
    </div>

    <div class="row"> 
        <div class="col-6">
            <h3 class="page-title"> List of Regions</h3>

        </div>
        

        <div class="col-6 peopleSearch">
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
                    <th>Current Alert</th>
                    <th>Actions</th>
                    </tr>

            <?php
                

                $query ="SELECT * FROM ZoneLevels";
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_user_query)) {

                $db_name = $row['GroupZone'];
                $db_alert = $row['ZoneLevel'];
                $region_id = $row['zoneID'];
           
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

                $query_positive="SELECT * FROM Person p , Diagnostic d ,Municipalities m ,ZoneMuni zm WHERE zm.﻿ZoneName LIKE '%$db_name%' AND zm.Municipality = m.City AND p.PostalCode = m.Zip AND p.Medicare =d.PatientMedicare  AND d.Result ='1'";

                $select_region_query_positive = (mysqli_query($connection, $query_positive));
                if(!$select_region_query_positive) {
                    die("QUERY FAILED". mysqli_error($connection));
                }
    
                    while($row = mysqli_fetch_array($select_region_query_positive)){
                        $count_positive++;
                    }

                echo "<td>$count_positive</td>" ;


                $query_negative="SELECT * FROM Person p , Diagnostic d ,Municipalities m ,ZoneMuni zm WHERE zm.﻿ZoneName LIKE '%$db_name%' AND zm.Municipality = m.City AND p.PostalCode = m.Zip AND p.Medicare =d.PatientMedicare  AND d.Result ='0'";

                $select_region_query_negative = (mysqli_query($connection, $query_negative));
                if(!$select_region_query_negative) {
                    die("QUERY FAILED". mysqli_error($connection));
                }
    
                    while($row = mysqli_fetch_array($select_region_query_negative)){
                        $count_negative++;
                    }
                echo "<td>$count_negative</td>" ;
                echo "<td>{$db_alert}</td>";

                echo "<td class='action'><a href='regions.php?delete={$region_id}'>Delete</a><br><a href='region-city-zip.php?edit={$db_name}'>Edit City/Zip</a> <br> <a href='edit-region-alert.php?edit={$region_id}'>Edit Region</a></td>";

                echo "</tr>";
            }

          ?>
            <?php
                global $connection;

                if(isset($_GET['delete'])) {
                    $zoneID=$_GET['delete'];
                    // echo $zonename;
                    $query_delete1="DELETE FROM `ZoneLevels` WHERE `zoneID` LIKE '$zoneID'";
                    $check_query_delete1 = mysqli_query($connection, $query_delete1);

                    header("Location: regions.php");
                }
            ?>



            </table>   
</div>
    
<?php include "includes/footer.php";?>