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
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>Search Bar using PHP</title>


  <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }


.button {
  background-color: #4CAF50; /* Green */
  border-radius: 7px;
  color: white;
  padding: 9px 18px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 1px 1px;
  cursor: pointer;
}

.button3 {background-color: green;}  
</style
</head>
<body>
<div class="page-header">
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["authName"]); ?></b>. Welcome to our site.</h1>
    </div>
    <a href='index.php'>Home</a> | <a href='user_view.php'>View User</a> | <a href='artical_search.php'>Search Article</a> | <a href='read.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='logout.php'>Logout</a>




<?php 
$id=$_GET['id'];

$query = "SELECT articles.*, users.name FROM articles
INNER JOIN users ON articles.author = users.id where articles.id=?";


//$query = "SELECT articles.*, users.name
//FROM articles
//LEFT JOIN users ON articles.author = users.id";


if($stmt=$dbc->prepare($query)){
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result=$stmt->get_result();
    $row=$result->fetch_object();
    ?>


<div class="container">
 <h3>Display User information:
</h3>
        <table class="table">
            <thead>
    <tr>
    <th>#</th>
    <th>Subject</th>
    <th>Body</th>
    <th>Author</th>
    <th>Date</th>
    <th>Action</th>
    </tr>
    </thead>



    <tbody>
        <tr>
        <td><?php echo $row->id ?></td>
        <td><?php echo $row->subject; ?></td>
        <td><?php echo $row->body; ?></td>
        <td><?php echo $row->name; ?></td>
        <td><?php echo $row->modified; ?></td>
        <td><a href="artical_search.php"><button class="button button3">Go Back</button></a></td>
        </tr>
        
        </tbody>
        </table>
        </div>

<?php
}
?>
</body>
</html>