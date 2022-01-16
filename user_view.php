<?php
// Initialize the session
session_start();
?>

 
<?php
if(!isset($_SESSION['authId'])) {
    header('Location: check.php');
}
?>
 
<?php
$db = mysqli_connect("localhost","root","mysql","Web3");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<!-- 2020 Fall Web Programming 3 (e) -->
<html>
<head>
<title><?php echo("Welcome, {$authName}!"); ?></title>

<meta charset="utf-8">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
        <link rel="stylesheet" type="text/css" href="style.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<div class="page-header">
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["authName"]); ?></b>. Welcome to our site.</h1>
    </div>
   <!-- <p>
        <a href="#" class="btn btn-warning">user create</a>
        
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>-->

    
    <a href='index.php'>Home</a> | <a href='user_view.php'>View User</a> | <a href='artical_search.php'>Search Article</a> | <a href='read.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='logout.php'>Logout</a>


<div class="container">
    <h2>User | Information</h2>

        <table class="table table-bordered">
              <thead>
		<tr>
			<th>id</th>
			<th>userid</th>
            <th>password</th>
            <th>name</th>
			<th colspan="2">Action</th>
		</tr>
    </thead> 

    <?php


//$records = mysqli_query($db,"select * from users"); // fetch data from database
$strSQL = "SELECT id,userID, password,name FROM users WHERE id = '".$_SESSION['authId']."'";
// Execute the query (the recordset $rs contains the result)
$rs = mysqli_query($db, $strSQL);


// Loop the recordset $rs
// Each row will be made into an array ($row) using mysqli_fetch_array
while($row = mysqli_fetch_array($rs)) {
    ?>
    
    <tr>
        <td><?php echo($row['id']); ?></td>
        <td><?php echo($row['userID']); ?></td>
        <td><?php echo($row['password']); ?></td>
        <td><?php echo($row['name']); ?></td>
        <td><a href="useredit.php?id=<?php echo $row['id']; ?>" class="edit_btn">Edit</a></td>
        
		<td><a href="deleteuser.php?id=<?php echo $row['id']; ?>" class="del_btn" onclick="return confirm('Are you sure?')">Delete</a></td>

   </tr>
   <?php 
} 
?>
 </table>
</div>
</body>
</html>