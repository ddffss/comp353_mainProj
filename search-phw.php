<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<!-- search people by address -->

    <?php
    if(isset($_POST['submit'])) {
        $facility =$_POST['facility'];
        $date =$_POST['date'];


        $query ="SELECT * FROM PublicHealthWorker phw , Diagnostic d, Person p WHERE d.PatientMedicare = phw.Medicare AND phw.Medicare = p.Medicare AND d.Deleted = 0 AND p.Deleted = 0 AND d.Result = 1 AND phw.WorkFacility LIKE '%$facility%' AND d.DateOfResult LIKE '%$date%'  GROUP BY phw.Medicare ORDER BY d.`Result` DESC";

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
                                <th>First Name</th>
                                <th>Work Facility</th>
                                </tr>
    
            <?php
    
                echo "<h3>List of Workers who Tested Positive on " .$date. " at ".$facility."</h3>";
                while($row = mysqli_fetch_array($select_user_query)) {
    
                    $db_firstName = $row['FirstName'];
                    $db_lastName = $row['LastName'];
                    $phw_facility = $row['WorkFacility'];


                    ?>
    
                        <tr>
                        <td><?php echo $db_firstName. ' ' . $db_lastName; ?></td>
                        <td><?php echo $phw_facility; ?></td>    
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