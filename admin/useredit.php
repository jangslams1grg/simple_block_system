<?php session_start(); ?>
 <?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
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
<html>
<head>
<title><?php echo("Welcome, {$authName}!"); ?></title>
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

<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<div class="page-header">
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h1>
    </div>
    <a href="index.php">Home</a> | <a href="view_user.php"> View User</a> | <a href='add_user.php'>Add New User</a> | <a href='artical_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | | <a href='article_search.php'>Search Article</a>
    <a href='logout.php'>Logout</a>

<br/><br/>



<?php
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db,"select * from users where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['save'])) // when click on Update button
{
  

    $userID = $_POST['userID'];
    $password = $_POST['password'];
    $name = $_POST['name'];

	
    $edit = mysqli_query($db,"update users set userID='$userID', password='$password', name='$name' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:view_user.php"); // redirects to all records page
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
        <button class="btn" name="save" value="Cancel" onClick="window.location.href='view_user.php';">Cancel</button>   
    </div>
</form>
</body>
</html>