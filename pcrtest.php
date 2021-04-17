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
        <p class="profile"><?php echo $_SESSION['firstName'].' '.$_SESSION['lastName'] ?></p>
        <p class="profile"><?php echo $_SESSION['medCardNum'] ?></p>
        <p class="profile"><?php echo $_SESSION['phone'] ?></p>
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
           <h3 class="page-title"> Covid-19 Test Result </h3>
        </div>

        <div class="col-6">
        </div>
    </div>


    <table class="facility-table">
        <tr>
        <th>Date Of Test</th>
        <th>Date of Result</th>
        <th>Result</th>
        <th>Symptom Progress</th>
        </tr>

    <?php
        $medicare =$_SESSION['medCardNum'];
        $query ="SELECT * FROM Person, Diagnostic WHERE Person.Medicare = Diagnostic.PatientMedicare AND Person.Medicare LIKE '$medicare'";

        $select_user_query = (mysqli_query($connection, $query));
        if(!$select_user_query) {
            die("QUERY FAILED". mysqli_error($connection));
        }



        while($row = mysqli_fetch_array($select_user_query)) {

            $db_dateoftest = $row['DateOfTest'];
            $db_dateofresult = $row['DateOfResult'];
            $db_result = $row['Result'];
          

            echo "<tr>";
            echo "<td>{$db_dateoftest}</td>";
            echo "<td>{$db_dateofresult}</td>";
            echo "<td>{$db_result}</td>";
            echo "<td><a href='./symptom-progress.php'>Symptom Progress</a></td>";
        }  
        
        $_SESSION['dateofresult'] = $db_dateofresult;
        
        ?>
        

    </table>  
    </div>

<?php include "includes/footer.php";?>