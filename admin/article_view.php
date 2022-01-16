<?php
session_start();

if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//Connection for database
include 'connect.php';
?>

<?php
$name = $_POST['search'];

/*$sql = ("SELECT articles.*, users.name FROM articles
INNER JOIN users ON articles.author = users.id order by id DESC");*/


$sql = ("SELECT articles.id,articles.subject,articles.body,articles.author,articles.modified, users.name
 FROM articles
INNER  JOIN users ON articles.author = users.id WHERE articles.subject LIKE '%$name%' OR articles.body LIKE '%$name%' 
OR users.name LIKE '%$name%' ORDER BY articles.id");


$result = $conn->query($sql);

?>
    
<!doctype html>
<html>
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
    
    <a href="index.php">Home</a> | <a href='view_user.php'>View User</a> | <a href="adduser.php">Add New User</a> | <a href='article_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='article_search.php'>Search Article</a>|
    <a href='logout.php'>Logout</a>

<br/><br/>

<div class="container">
    <h2>Articles Information</h2>
    <div class="container">

    
        <form action="article_view.php" method="POST" class="form">
        <input type="text" placeholder="Type the name here" name="search">&nbsp;

        <input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">

        </form>
        <table class="table table-bordered">


        <table class="table table-bordered">
        <thead>
        <tr>
        <th>subject</th>
        <th>body</th>
        <th>author</th>
        <th>modified</th>
        <th colspan="2">Action</th>
        </tr>
        </thead> 

<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['subject']; ?></td>
 <td><?php echo $row['body']; ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['modified']; ?></td>

 <!--Edit option -->
 <td><a href="article_edit.php?edit_id=<?php echo $row['id']; ?>" alt="edit" >Edit</a></td>
 <td><a href="delete_article.php?id=<?php echo $row['id']; ?>" class="del_btn" onclick="return confirm('Are you sure?')">Delete</a></td>

 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="5">There's No Articles found!!!</th>
 </tr>
 <?php
}
?>
</table>
</body>
</html>