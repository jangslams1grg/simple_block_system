<?php
session_start();
require_once("include/connect.php");
    $authName = $_SESSION['authName'] ?? 'guest';

 if(!isset($_SESSION['authId'])) {
    header('Location: check.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo("Welcome, {$authName}!"); ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($dbc,"select * from users where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['save'])) // when click on Update button
{
  

    $userID = $_POST['userID'];
    $password = $_POST['password'];
    $name = $_POST['name'];

	
    $edit = mysqli_query($dbc,"update users set userID='$userID', password='$password', name='$name' where id='$id'");
	
    if($edit)
    {
        mysqli_close($dbc); // Close connection
        header("location:user_view.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
<h2 align="center">Edit User</h2>

<form action="" method="POST">
    <div class="input-group">    
        <label>UserID</label>
        <input type="text" name="userID" value="<?php echo $data['userID'] ?>">
    </div>

    <div class="input-group">
        <label>Password</label> 
        <input type="password" name="password" value="<?php echo $data['password'] ?>">
    </div>

    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $data['name'] ?>">
    </div>

    <div class="input-group">
        <button class="btn" type="submit" name="save">Update</button>
        <button class="btn" name="save" value="Cancel" onClick="window.location.href='user_view.php';">Cancel</button>   

    </div>
</form>
</body>
</html>