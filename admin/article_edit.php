<?php session_start(); ?>
 <?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

//Database Connection
include 'connect.php';
//Get ID from Database
if(isset($_GET['edit_id'])){
 $sql = "SELECT * FROM articles WHERE id =" .$_GET['edit_id'];
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
}
//Update Information
if(isset($_POST['btn-update'])){
 $subject = $_POST['subject'];
 $body = $_POST['body'];
$modified = $_POST['modified'];
$author = $_POST['author'];


 $update = "UPDATE articles SET subject='$subject', body='$body', modified='$modified', author='$author' WHERE id=". $_GET['edit_id'];
 $up = mysqli_query($conn, $update);
 if(!isset($sql)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else
 {
     ?>
    <script>
        alert("Updated data Sucessfully");
        setTimeout(() => {
            window.location.href = 'article_view.php';
        }, 1000);
    </script>
<?php
 //header("location: artical_search.php");
 }
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
       
    <a href="index.php">Home</a> | <a href="view_user.php"> View User</a> | <a href='add_user.php'>Add New User</a> | <a href='article_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | | <a href='article_search.php'>Search Article</a>
    <a href='logout.php'>Logout</a>
<br/><br/>
<h1>Edit Articles Information</h1>

<form action="" method="POST">
    <div class="input-group">    
        <label>SUBJECT</label>
        <input type="text" name="subject" placeholder="Subject" value="<?php echo $row['subject']; ?>"><br/><br/>
    </div>


    <div class="input-group">
        <label>BODY</label> 
        <input type="text" name="body" value="<?php echo $row['body'] ?>">
    </div>

    <div class="input-group">
        <label>AUTHOR</label> 
        <select name="author">
                <option selected="selected">select Author</option>
                <?php
                $res=$conn->query("SELECT * FROM users");
                while($user=$res->fetch_array())
                {
                ?>
                    <option <?php echo ($user['id'] == $row['author']) ? 'selected': ''; ?> value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                    <?php
                }
                ?>
        </select><br />    
    </div>

    <div class="input-group">
        <label>Date</label> 
        <input type="text" name="modified" placeholder="date" value="<?php echo $row['modified']; ?>">
    </div>


    <div class="input-group">
        <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
        <a href="view_user.php"><button type="button" value="button">Cancel</button></a>
    </div>
</form>

</body>
</html>