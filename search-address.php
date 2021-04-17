<?php include "includes/db.php";?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<!-- search people by address -->
    <?php
    if(isset($_POST['submit'])) {
        $search =$_POST['search'];

        $query ="SELECT * FROM Person WHERE Address LIKE '%$search%' ";
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
                            <th>Medicare Card Number</th>
                            <th>Phone Number</th>
                            <th>Citizenship</th>
                            <th>Email</th>
                            <th>Mother</th>
                            <th>Father</th>
                            </tr>

        <?php

            echo "<h3>Here's the list of People who lives at ".$search."</h3>";
            while($row = mysqli_fetch_array($select_user_query)) {

                $db_firstName = $row['FirstName'];
                $db_lastName = $row['LastName'];
                $db_medCardNum = $row['Medicare'];
                $db_dob = $row['DOB'];
                $db_phone = $row['Phone'];
                $db_address = $row['Address'];
                $db_city = $row['City'];
                $db_province = $row['Province'];
                $db_postalCode = $row['PostalCode'];
                $db_citizenship = $row['Citizenship'];
                $db_email = $row['Email'];
                $db_mother = $row['Parent1'];
                $db_father = $row['Parent2'];
                ?>

                    <tr>
                    <td><?php echo $db_firstName. ' ' . $db_lastName; ?></td>
                    <td><?php echo  $db_dob; ?></td>
                    <td><?php echo  $db_medCardNum; ?></td>
                    <td><?php echo  $db_phone; ?></td>
                    <td><?php echo  $db_citizenship; ?></td>
                    <td><?php echo  $db_email; ?></td>
                    <td><?php echo  $db_mother; ?></td>
                    <td><?php echo  $db_father; ?></td>

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