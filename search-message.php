<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<!-- search people by address -->

    <?php
    if(isset($_POST['submit'])) {
        $start =$_POST['start'];
        $end =$_POST['end'];

        $medicare=$_SESSION['medCardNum']; 

        $query ="SELECT * FROM Messages WHERE medicare LIKE '%$medicare%' AND date BETWEEN '$start' and '$end'";

        $select_user_query = mysqli_query($connection, $query);

        if(!$select_user_query) {
            die("QUERY FAILED" . mysqli_Error($connection));
        }

        // counts the total result of the search
        $count = mysqli_num_rows($select_user_query);

        if($count == 0) {
            echo "<h4>NO RESULT</h4>";
        }

        else { 
            while($row = mysqli_fetch_array($select_user_query)) {

                $db_date = $row['date'];
                $db_time = $row['time'];
                $db_guidelines = $row['guidelines'];
                $db_messageDescription = $row['messageDescription']; ?>

                <!-- <table style="border:1px black solid";> -->
                <table>
                <br>
                <tr><b><?php echo $db_guidelines ?></b></tr>
                <tr><br><?php echo $db_messageDescription ?></tr>
                <tr><br><?php echo 'recieved on'.$db_date. ' at '. $db_time ?></tr>
                </br>
                </table>
                <hr>

               <?php }
        }
            
    }

    ?>
    </table>   
    </div>
    <div class="col-1"></div>
    </div>

<?php include "includes/footer.php";?>