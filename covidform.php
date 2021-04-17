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


<?php

if(isset($_POST['add_to_symptom_history'])) {

    $date = $_POST['date'];
    $time= $_POST['time'];
    $medicare = $_POST['medicare'];
    $fever = isset($_POST['fever']) ? 1: 0;
    $cough = isset($_POST['cough'])? 1: 0;
    $difficultybreathing = isset($_POST['difficultybreathing'])? 1: 0;
    $lossoftaste = isset($_POST['lossoftaste'])? 1: 0;
    $nausea = isset($_POST['nausea'])? 1: 0;
    $stomachache = isset($_POST['stomachache'])? 1: 0;
    $vomiting = isset($_POST['vomiting'])? 1: 0;
    $headache = isset($_POST['headache'])? 1: 0;
    $musclepain = isset($_POST['musclepain'])? 1: 0;
    $diarrhea = isset($_POST['diarrhea'])? 1: 0;
    $sorethroat = isset($_POST['sorethroat'])? 1: 0;
    $others = $_POST['others'];

    $query = "INSERT INTO SymptomHistory(DateOftest, Time, PatientMedicare, Fever, Cough, DifficultyBreathing, LossOfTasteOrSmell, Nausea, StomachAches, Vomiting, Headache, MusclePain, Diarrhea, SoreThroat,OtherSymptoms ) ";
    $query .= "VALUES('{$date}', '{$time}','{$medicare}','{$fever}','{$cough}','{$difficultybreathing}', '{$lossoftaste}', '{$nausea}', '{$stomachache}', '{$vomiting}','{$headache}', '{$musclepain}','{$diarrhea}', '{$sorethroat}','{$others}')";

    $create_user_query = mysqli_query($connection, $query);

    // confirmQuery($create_post_query);
    if(!$create_user_query) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    header("Location: details.php");

} 

?>

<?php
    $medicare =$_SESSION['medCardNum'];
    $query ="SELECT * FROM Person, Diagnostic WHERE Person.Medicare = Diagnostic.PatientMedicare AND Diagnostic.Result=1 AND Person.Medicare LIKE '$medicare'";

    $select_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_query)) {
    
    ?>

        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-auto">
        <h3 class="covidform">Covid-19 Follow-up Form</h3>

        <form action="./covidform.php" method="post">

            <div class="add form-group">
                <label for="date">Date:</label>
                <input type="date" name="date">
            </div>

            <div class="add form-group">
                <label for="time">Time:</label>
                <input type="text" name="time" placeholder="hh:mm">
            </div>

            <div class="add form-group" style="display:none;">
                <label for="medicare">medicare</label>
                <input type="text" name="medicare" value="<?php echo $_SESSION['medCardNum']; ?>">
            </div>

            <h6 class="symptoms">Check your symptoms</h6>

            <div class="add form-group">
             <label for="fever">Fever</label>
                <input type="checkbox" class="symptom" name="fever" value="1">
            </div>

            <div class="add form-group">
                <label for="cough">Cough</label>
                <input type="checkbox" class="symptom" name="cough" value="1">
            </div>

            <div class="add form-group">
                <label for="difficultybreathing">Difficulty breathing</label>
                <input type="checkbox" class="symptom" name="difficultybreathing" value="1">
            </div>

            <div class="add form-group">
                <label for="lossoftaste">Loss of taste and smell</label>
                <input type="checkbox" class="symptom" name="lossoftaste" value="1">
            </div>    

            <div class="add form-group">
                <label for="nausea">Nausea</label>
                <input type="checkbox" class="symptom" name="nausea" value="1">
            </div>

            <div class="add form-group">
                <label for="stomachache">Stomach Aches</label>
                <input type="checkbox" class="symptom" name="stomachache" value="1">

            </div>

            <div class="add form-group">
                <label for="vomiting">Vomiting</label>
                <input type="checkbox" class="symptom" name="vomiting" value="1">
            </div>

            <div class="add form-group">
                <label for="headache">Headache</label>
                <input type="checkbox" class="symptom" name="headache" value="1">
            </div>

            <div class="add form-group">
                <label for="musclepain">Muscle Pain</label>
                <input type="checkbox" class="symptom" name="musclepain" value="1">
            </div>    

            <div class="add form-group">
                <label for="diarrhea">Diarrhea</label>
                <input type="checkbox" class="symptom" name="diarrhea" value="1">
            </div>

            <div class="add form-group">
                <label for="sorethroat">Sore Throat</label>
                <input type="checkbox" class="symptom" name="sorethroat" value="1">
            </div>

            <div class="add form-group">
                <label for="others">Other Symptoms:</label>
                <input type="text" name="others">
            
            <div class="add form-group">
                <input class="btn btn-primary" type="submit" name="add_to_symptom_history" value="Add to Symptom History">
            </div>

        </form> 
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php }


?>

</div> 

<?php include "includes/footer.php";?>