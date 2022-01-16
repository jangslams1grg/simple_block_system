<?php
// Initialize the session
session_start();
require_once("include/connect.php");
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
    <a href='index.php'>Home</a> | <a href='user_view.php'>View User</a> | <a href='artical_search.php'>Search Article</a> | <a href='read.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='logout.php'>Logout</a>
<br/><br/>


<div class="container">
    <h2>User | Information</h2>

    <table class="table table-bordered">
    <thead>
    <tr>
    <th>#</th>
    <th>Subject</th>
    <th>Body</th>
    <th>Author</th>
    <th>Date</th>
    <th colspan="2">Action</th>
    
    </tr>
    </thead>

    <?php 
//$id=$_GET['id'];
require 'include/config.php'; //database details


//$query ="select * from articals where id=?";
//$strSQL = "SELECT id,subject, body,author,modified FROM articles WHERE id = '".$_SESSION['authId']."'";

$query = "SELECT articles.*, users.name FROM articles
INNER JOIN users ON articles.author = users.id WHERE articles.author = '".$_SESSION['authId']."'";


//$query = "SELECT articles.*, users.name
//FROM articles
//LEFT JOIN users ON articles.author = users.id";


if($stmt=$dbc->prepare($query)){
    //$stmt->bind_param('i',$id);
    $stmt->execute();
    $result=$stmt->get_result();
    while($row=$result->fetch_object()){
    ?>

    
        <tr>
        <td><?php echo $row->id ?></td>
        <td><?php echo $row->subject; ?></td>
        <td><?php echo $row->body; ?></td>
        <td><?php echo $row->name; ?></td>
        <td><?php echo $row->modified; ?></td>

        <td><a href="article_edit.php?id=<?php echo $row->id ?>" class="edit_btn">Edit</a></u></td>
        <!--<td><a href="useredit.php?id=<?php //echo $row['id']; ?>" class="edit_btn">Edit</a></td>-->
		<td><a href="deletearticals.php?id=<?php echo $row->id ?>" class="del_btn" onclick="return confirm('Are you sure?')">Delete</a></td>

         </tr>
        
        <?php }     
        }   
        ?>
        </table>
        </div>
</body>
</html>