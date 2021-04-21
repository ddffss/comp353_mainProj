<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<!-- search people by address -->
    <?php
    if(isset($_POST['submit'])) {
        $search =$_POST['search'];

        $query =" SELECT * FROM PublicHealthWorker phw, Person p WHERE WorkFacility LIKE '%$search%' AND p.Medicare=phw.Medicare AND phw.Deleted=0";

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
                            <th>Name</th>     
                            <th>Facility</th>     
                            </tr>

        <?php

            echo "<h3>List of PH workers who works at ".$search."</h3>";
            while($row = mysqli_fetch_array($select_user_query)) {

                $db_firstName = $row['FirstName'];
                $db_lastName = $row['LastName'];
                $db_facility = $row['WorkFacility'];
                $db_medCardNum = $row['Medicare'];
                ?>

                    <tr>
                    <td><?php echo $db_firstName. ' ' . $db_lastName; ?></td>
                    <td><?php echo $db_facility ?></td>
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