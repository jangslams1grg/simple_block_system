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
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }

.form {
    width: 100%;
    margin: 50px auto;
    text-align: left;
    padding: 20px;
    border: 1px solid #bbbbbb;
    border-radius: 5px;
}


.form input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 90%;
  background: #f1f1f1;
  border-radius: 5px;

}

.form input[type=submit] {
  font-size: 17px;
  border: 1px solid grey;
  width: 7%;
  height:5%;
  border-radius: 5px;
    }
    </style>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="page-header">
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h1>
    </div>
   <!-- <p>
        <a href="#" class="btn btn-warning">user create</a>
        
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>-->
    
    <a href="index.php">Home</a> | <a href='view_user.php'>View User</a> | <a href="adduser.php">Add New User</a> | <a href='article_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='article_search.php'>Search Article</a> | 
    <a href='logout.php'>Logout</a>

<br/><br/>

<div class="container">
    <h2>user information</h2>
    <div class="container">
        <form action="view_user.php" method="POST" class="form">
        <input type="text" placeholder="Type the name here" name="search">&nbsp;

        <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">

        </form>
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
$name = $_POST['search'];
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($conn, "SELECT * FROM users
WHERE id LIKE '%{$name}%' OR userID LIKE '%{$name}%' OR name LIKE '%{$name}%'");
?>
    
    <?php
    while($row = $result->fetch_assoc()){
    ?>
    
    <tr>
        <td><?php echo($row['id']); ?></td>
        <td><?php echo($row['userID']); ?></td>
        <td><?php echo($row['password']); ?></td>
        <td><?php echo($row['name']); ?></td>
        <td><a href="useredit.php?id=<?php echo $row['id']; ?>" class="edit_btn">Edit</a></td>
        <td><a href="deleteuser.php?id=<?php echo $row['id']; ?>" class="del_btn" onclick="return confirm('Are you sure?')">Delete</a></td>
   </tr>
   <?php } 
?>
 </table>
</div>
</body>
</html>