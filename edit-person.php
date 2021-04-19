<?php include "includes/db.php";?>

<?php session_start();?>

<?php include "includes/header.php";?>
<?php include "includes/index-nav.php";?>


<div class="container">

<?php
    if(isset($_GET['edit'])) {
        $medicare=$_GET['edit'];
        $query="SELECT * FROM Person WHERE Medicare LIKE '$medicare'";
        $select_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_query)) {

            $firstname = $row['FirstName'];
            $lastname = $row['LastName'];
            $dob = $row['DOB'];
            $phone = $row['Phone'];
            $address = $row['Address'];
            $city = $row['City'];
            $province = $row['Province'];
            $postalcode = $row['PostalCode'];
            $email = $row['Email'];
            $citizenship = $row['Citizenship'];
            $parent1 = $row['Parent1'];
            $parent2 = $row['Parent2'];
        }


    }

    if(isset($_POST['edit_person'])) {

        $medicare = $_POST['medicare'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $postalcode = $_POST['postalcode'];
        $email = $_POST['email'];
        $citizenship = $_POST['citizenship'];
        $parent1 = $_POST['mother'];
        $parent2 = $_POST['father'];

        $query = "UPDATE Person SET ";
        $query .= "FirstName ='{$firstname}', ";
        $query .= "LastName ='{$lastname}', ";
        $query .= "DOB ='{$dob}', ";
        $query .= "Phone ='{$phone}', ";
        $query .= "Address ='{$address}', ";
        $query .= "City ='{$city}', ";
        $query .= "Province ='{$province}', ";
        $query .= "PostalCode ='{$postalcode}', ";
        $query .= "Email ='{$email}', ";
        $query .= "Citizenship ='{$citizenship}', ";
        $query .= "Parent1 ='{$parent1}', ";
        $query .= "Parent2 ='{$parent2}' ";
        $query .="WHERE Medicare LIKE '%$medicare%' "  ;
        echo $query;
        $update_query = mysqli_query($connection, $query);

        if(!$update_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }
        header("Location: people.php");

    }



?>
<div container>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./edit-person.php" method="post" enctype="multipart/form-data">


          
                <div class="edit form-group">
                    <label for="medicare">Medicare</label>
                    <input type="text" name="medicare" value="<?php echo $medicare; ?>">
                </div>

                <div class="edit form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>">
                </div>

                <div class="edit form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" value="<?php echo $lastname;?>">
                </div>

                <div class="edit form-group">
                    <label for="dob">Birthday</label>
                    <input type="date" name="dob" value="<?php echo $dob; ?>">
                </div>

                <div class="edit form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="<?php echo $phone; ?>">
                </div>

                <div class="edit form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?php echo $address;?>">
                </div>

                <div class="edit form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" value="<?php echo $city; ?>">
                </div>

                <div class="edit form-group">
                    <label for="province">Province</label>
                    <input type="text" name="province" value="<?php echo $province; ?>">
                </div>

                <div class="edit form-group">
                    <label for="postalcode">PostalCode</label>
                    <input type="text" name="postalcode" value="<?php echo $postalcode;?>">
                </div>

                <div class="edit form-group">
                    <label for="citizenship">Citizenship</label>
                    <input type="text" name="citizenship" value="<?php echo  $citizenship; ?>">
                </div>

                <div class="edit form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo $email;?>">
                </div>

                <div class="edit form-group">
                    <label for="mother">Mother</label>
                    <input type="text" name="mother" value="<?php echo  $parent1; ?>">
                </div>

                <div class="edit form-group">
                    <label for="father">Father</label>
                    <input type="text" name="father" value="<?php echo $parent2;?>">
                </div>

                <div class="edit form-group">
                    <input class="btn btn-primary" type="submit" name="edit_person" value="Update">
                </div>

            </form> 
        </div>
        <div class="col-3"></div>
    </div>
</div>
<?php include "includes/footer.php";?>