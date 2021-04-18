<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<!-- search people by address -->

    <?php
    if(isset($_POST['submit'])) {
        $search =$_POST['search'];

        $query ="SELECT * FROM Person p2 , Diagnostic d WHERE p2.Deleted = 0 AND d.Deleted = 0 AND d.PatientMedicare = p2.Medicare AND d.DateOfResult LIKE '%$search%' ORDER BY d.`Result` DESC";

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
                <th>Birthday</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Result</th>
                </tr>

        <?php 
            echo "<h3>Here's the list people who got the test result on ".$search."</h3>";
            while($row = mysqli_fetch_array($select_user_query)) {

                $diagnostic_firstname = $row['FirstName'];
                $diagnostic_lastname = $row['LastName'];
                $diagnostic_dob = $row['DOB'];
                $diagnostic_phone = $row['Phone'];
                $diagnostic_email = $row['Email'];
                $diagnostic_result = $row['Result'];

                ?>

                    <tr>
                    <td><?php echo $diagnostic_firstname. ' ' .$diagnostic_lastname; ?></td>
                    <td><?php echo  $diagnostic_dob; ?></td>
                    <td><?php echo  $diagnostic_phone; ?></td>
                    <td><?php echo  $diagnostic_email; ?></td>
                    <td><?php echo  $diagnostic_result; ?></td>
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