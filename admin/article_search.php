<?php
    session_start();
    require_once("db/config.php");
    if(!isset($_SESSION['valid'])) {
        header('Location: login.php');
    }
    ?>


<!DOCTYPE html>
<html>
<head>
<title><?php echo("Welcome, {$authName}!"); ?></title>
<style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
<link rel="stylesheet" type="text/css"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 </head>
<body>
<div class="page-header">
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h1>
    </div>
    
      
    <a href="index.php">Home</a> | <a href='view_user.php'>View User</a> | <a href="adduser.php">Add New User</a> | <a href='article_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='article_search.php'>Search Article</a>|
    <a href='logout.php'>Logout</a>


<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
</form>
<?php

  if(isset($_POST["submit"])){
  $str = $_POST["search"];

    //$sth = $con->prepare("SELECT * FROM `articles` where subject= '$str' order  by  id");
    $sth = $conn->prepare( "SELECT * FROM articles
    WHERE id LIKE '%{$str}%' OR subject LIKE '%{$str}%'");
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth-> execute();
    
        if($row = $sth->fetch())
        {
                ?>
    
            <div class="container">
            <h3>Display Article:</h3>   
            <table class="table table-striped table-responsive">
            <thead>
            <tr>
            <td>#</td>
            <td>Subject</td>
            </tr>

   <!-- <th>Description</th>-->
    </thead>
    <tbody>
        <tr>
        <td><u><a href="articals_details.php?id=<?php echo $row->id ?>" role="button" class="btn"><?php echo $row->id ?></a></u></td>
        <td><?php echo $row->subject; ?></td>
        </tr>
        </tbody>
        </table>
        </div>
        <?php 
    }
    else{
        echo "No Employee Name Found !";
    }
}
?>
</body>
</html>