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


    <form action="/action_page.php">
        <div class="form-group details">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['firstName'].' '. $_SESSION['lastName'] ?>">
        </div>

        <div class="form-group details">
            <label for="medicare">Medicare Card No.:</label>
            <input type="text" id="medicare" name="medicare" value="<?php echo $_SESSION['medCardNum']?>">
        </div>

        <div class="form-group details">
            <label for="dob">Birthday:</label>
            <input type="text" id="dob" name="dob" value="<?php echo $_SESSION['dob'] ?>">
        </div>

        <div class="form-group details">
            <label for="phone">Phone No.:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['phone'] ?>">
        </div>

        <div class="form-group details">
            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" value="<?php echo  $_SESSION['email']?>">
        </div>

        <div class="form-group details">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $_SESSION['address'].' '.  $_SESSION['city'].' '.$_SESSION['province'].' '.$_SESSION['postalCode']?>">
        </div>

        <div class="form-group details">
            <label for="mother">Mother:</label>
            <input type="text" id="mother" name="mother" value="<?php echo $_SESSION['mother']?>">
        </div>    

        <div class="form-group details">
            <label for="father">Father:</label>
            <input type="text" id="father" name="father" value="<?php echo $_SESSION['father']?>">
        </div>

    </form> 
</div>

<?php include "includes/footer.php";?>