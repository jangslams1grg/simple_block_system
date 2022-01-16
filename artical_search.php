<?php
    session_start();
    require_once("include/config.php");
    $authName = $_SESSION['authName'] ?? 'guest';

 if(!isset($_SESSION['authId'])) {
    header('Location: check.php');
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
  <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["authName"]); ?></b>. Welcome to our site.</h1>
    </div>
    
      
    <a href='index.php'>Home</a> | <a href='user_view.php'>View User</a> | <a href='artical_search.php'>Search Article</a> | <a href='read.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='logout.php'>Logout</a>
<br/><br/>

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