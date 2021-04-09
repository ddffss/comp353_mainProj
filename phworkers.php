<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">
    <div class="row">
    <h3> List of Public Health Workers at</h3>

        <div class="col-1"></div>
        <div class="col-md-auto">
            <table id="population">
                    <tr>
                    <th>Medicare</th>
                    <th>Shift</th>
                    </tr>

            <?php
                
                if(isset($_GET['Name'])) {

                    $post_wf = $_GET['Name'];      
                }

                $query ="SELECT * FROM PublicHealthWorker WHERE WorkFacility = wf";

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }



                while($row = mysqli_fetch_array($select_user_query)) {

                $db_medicare = $row['Medicare'];
                $db_shift = $row['Shift'];
                ?>

                    <tr>
                    <td><?php echo  $db_medicare; ?></td>
                    <td><?php echo $db_shift; ?></td>

                    </tr> 

            <?php } ?>


            </table>   
        </div>
        <div class="col-1"></div>
    </div>
    
<?php include "includes/footer.php";?>