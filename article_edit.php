<?php
session_start();
    $authName = $_SESSION['authName'] ?? 'guest';

 if(!isset($_SESSION['authId'])) {
    header('Location: check.php');
}


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
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php
$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db,"select * from articles where id='$id'"); // select query



$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['save'])) // when click on Update button
{
  

    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $author = $_POST['author'];
    $date = $_POST['date'];

	
    $edit = mysqli_query($db,"update articles set id='$id', subject='$subject', body='$body', author='$author', modified='$date' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:read.php"); // redirects to all records page
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
        <label>ID</label>
        <input type="text" name="id" value="<?php echo $data['id'] ?>" readonly>
    </div>

    <div class="input-group">
        <label>Subject</label> 
        <input type="text" name="subject" value="<?php echo $data['subject'] ?>">
    </div>

    <div class="input-group">
        <label>Body</label>
        <input type="text" name="body" value="<?php echo $data['body'] ?>">
    </div>

    <div class="input-group">
        <label>Author</label>
        <input type="text" name="author" value="<?php echo $data['author'] ?>" readonly>
    </div>

    <div class="input-group">
        <label>Date</label>
        <input type="text" name="date" value="<?php echo $data['modified'] ?>">
    </div>

    <div class="input-group">
        <button class="btn" type="submit" name="save">Update</button>
        <button class="btn" name="save" value="Cancel" onClick="window.location.href='read.php';">Cancel</button>   

    </div>
</form>
</body>
</html>