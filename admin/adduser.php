<?php session_start(); 
require_once("connect.php")

?>
 <?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>



<!DOCTYPE html>
<!-- 2020 Fall Web Programming 3 (e) -->
<html>
<head>
<meta charset="utf-8">
<title></title>
<style type="text/css">
    body{ text-align: center; }
</style>

<link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<div class="page-header">
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h1>
    </div>
    
    <a href="index.php">Home</a> | <a href='view_user.php'>View User</a> | <a href="adduser.php">Add New User</a> | <a href='article_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='article_search.php'>Search Article</a> | 
    <a href='logout.php'>Logout</a>

<br/><br/>
    <h2 align="center">Create A User</h2>
    <?php
    if(isset($_POST['save'])) {

    //get the userID and comment entered by user
    $userID = $_POST['userID'];
    $password = $_POST['password'];
    $name = $_POST['name'];




    $check=mysqli_query($conn,"select * from users where  userID='$userID'");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
    echo "<center><font color=blue size='3pt'>Exists &nbsp;&nbsp;</font></center>";
} else {  
    //insert results from the form input
      $query = "INSERT IGNORE INTO users(userID, password, name) VALUES('$userID', '$password', '$name')";

      $result = mysqli_query($conn, $query) or die('Error querying database.');

      mysqli_close($conn);
    }
    echo "<center><font color=blue size='3pt'>User Added</font></center>";

    //header('location: create1.php');
    };
?>

<form action="" method="POST">

    <div class="input-group">    
        <label>UserID</label>
            <input type="text" name="userID" placeholder="Enter Your UserId" Required>
    </div>

    <div class="input-group">
    <label>Password</label> 
    <!--<input type="password" name="password" required>-->
    <input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter your password" Required>

    </div>

    <div class="input-group">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name" Required>
    </div>

    <div class="input-group">
    <button class="btn" type="submit" name="save">Create</button>
    <button class="btn" name="cancel" value="cancel" onClick="window.location.href='view_user.php';" />Cancel</button>   

    </div>
</form>


</body>
</html>