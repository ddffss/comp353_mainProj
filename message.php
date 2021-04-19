<?php include "includes/db.php";?>

<?php session_start();?>


<?php include "includes/header.php";?>
<?php include "includes/prof-nav.php";?>

<div class="container">
<div class="row profile">
    <div class="col-2">
        <span class="dot"></span>
    </div>
    <div class="col-9">
        <p class="profile"><?php echo $_SESSION['firstName'].' '. $_SESSION['lastName']?></p>
        <p class="profile"><?php echo $_SESSION['medCardNum']?></p>
        <p class="profile"><?php echo $_SESSION['phone']?></p>
    </div>
    <div class="col-1"></div>

<br>
<?php include "includes/prof-sub-nav.php";?>
<hr>
</div>
<br>

            <div class="container">

                <div class="row"> 
                    <div class="col-6">
                    <h3 class="page-title">Messages</h3>
                    </div>

                    <div class="col-6">
                    </div>
                </div>

                <table class="facility-table">
                <br>
                <hr>

                <?php


                $medicare=$_SESSION['medCardNum'];
                
                $query ="SELECT * FROM Messages WHERE medicare LIKE '%$medicare%'";
                // $query ="SELECT * FROM Messages";

                // echo $query;

                // function below will pull out the result
                $select_user_query = (mysqli_query($connection, $query));
                if(!$select_user_query) {
                    die("QUERY FAILED". mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_user_query)) {

                $db_date = $row['date'];
                $db_time = $row['time'];
                $db_guidelines = $row['guidelines'];
                $db_messageDescription = $row['messageDescription']; ?>

                <!-- <table style="border:1px black solid";> -->
                <table>
                <tr><b><?php echo $db_guidelines ?></b></tr>
                <tr><br><?php echo $db_messageDescription ?></tr>
                <tr><br><?php echo 'recieved on'.$db_date. ' at '. $db_time ?></tr>
                </table>
                <hr>

               <?php }

          ?>

</table>  
    </div>
    
<?php include "includes/footer.php";?>