<?php
session_start();
require_once('include/connect.php');
$authName = $_SESSION['authName'] ?? 'guest';

//if(!isset($_SESSION['authId'])) {
//header('Location: check.php');
//}
 // $db = mysqli_connect('localhost', 'root', 'mysql', 'Web3');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo("Welcome, {$authName}!"); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>

        <?php
            if(isset($_POST['save'])) {

            //get the userID and comment entered by user
            $userID = $_POST['userID'];
            $password = $_POST['password'];
            $name = $_POST['name'];



            //connect to the database
            //$dbc = mysqli_connect('localhost', 'root', 'mysql', 'Web3') or die('Error connecting to MySQL server');
            $check=mysqli_query($dbc,"select * from users where  userID='$userID'");
            $checkrows=mysqli_num_rows($check);

            if($checkrows>0) {
            echo "<font color=blue size='3pt'>Exists &nbsp;&nbsp;</font>";
            //echo "<p>Hello &nbsp;&nbsp;&nbsp; punt"; // This will render as Hello   Punt (with 4 white spaces)


         } else {  
            //insert results from the form input
            $query = "INSERT IGNORE INTO users(userID, password, name) VALUES('$userID', '$password', '$name')";

            $result = mysqli_query($dbc, $query) or die('Error querying database.');

            mysqli_close($dbc);
            }
             echo "<font color=blue size='3pt'>User Added</font>";

            //header('location: create1.php');
            };
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label>UserID</label>
                <input type="text" name="userID" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="save">Create</button>
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="check.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>