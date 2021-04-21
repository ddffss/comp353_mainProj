<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<!-- search people by address -->
    <?php
    if(isset($_POST['submit'])) {
        $start =$_POST['start'];
        $end =$_POST['end'];
        $regionname = $_POST['regionname'];

        $query = "SELECT DISTINCT m.date ,m.oldAlertState , m.newAlertState FROM Messages m WHERE m.region LIKE '%$regionname%' AND m.newAlertState IS NOT NULL GROUP BY m.date";

        $select_user_query = mysqli_query($connection, $query);

        if(!$select_user_query) {
            die("QUERY FAILED" . mysqli_Error($connection));
        }

        // counts the total result of the search
        $count = mysqli_num_rows($select_user_query);

        if($count == 0) {
            echo "<h4>NO RESULT</h4>";
        }

        else { ?>
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-md-auto">
                    <table id="population">
                            <tr>
                            <th>Date</th>
                            <th>Alert State</th>
                            </tr>

        <?php

            echo "<h3>Alert History betweeen ".$start. " and ".$end. "</h3>";
            while($row = mysqli_fetch_array($select_user_query)) {

                $db_date = $row['date'];
                $db_old= $row['oldAlertState'];
                ?>

                    <tr>
                    <td><?php echo $db_date; ?></td>
                    <td><?php echo $db_old; ?></td>
    

                    </tr> 

            <?php }


        }
    }

    ?>
    </table>   
    </div>
    <div class="col-1"></div>
    </div>

<?php include "includes/footer.php";?>