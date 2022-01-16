<?php
session_start();
require_once('../db_connect.php');

if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo("Welcome, {$authName}!"); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
    
    <style type="text/css">

        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }

        a.one:link {color:#3765ab;}
        a.one:visited {color:#0000ff;}
        a.one:hover {color:#ffcc00;}
    </style>
</head>
<body>
<div class="page-header">
  <h4 align="center">Hi,<a class="one" href="#"><?php echo htmlspecialchars($_SESSION["name"]); ?></i>. Welcome to our site.</a></h4>
    </div>
   <!-- <p>
        <a href="#" class="btn btn-warning">user create</a>
        
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>-->
    <a href="index.php" target="_blank">Home</a> | <a href='view_user.php'>View User</a> | <a href="adduser.php">Add New User</a> | <a href='article_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='article_search.php'>Search Article</a>| 
    <a href='logout.php'>Logout</a>

<br/><br/>


    <div class="wrapper">
        <h2>Add Article</h2>
        <p>Please fill this form to create an Article.</></p>

        <?php
            if(isset($_POST['save'])) {

                //get the userID and comment entered by user
                $author = $_POST['author'];
                $subject = $_POST['subject'];
                $body = $_POST['body'];
                //$category = $_POST['category'];
                $date = $_POST['datetime'];
                //connect to the database
                $dbc = $mysqli;
                //insert results from the form input
                $query = "INSERT IGNORE INTO articles(subject,body,author,modified) VALUES('$subject', '$body', '$author', '$date')";
                $result = mysqli_query($dbc, $query) or die('Error querying database.');
                //mysqli_close($dbc);
                if(!empty($result)){
                    echo '<div class="alert alert-success">Article Added Successfully.</div>';
                }
            }
            
        ?>
        <form action="" method="post">

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control" required></textarea>
            </div>


            <div class="form-group">
                <label>Author</label><br>
                <select name="author">
                <option selected="selected">select Author</option>
                <?php
                $dbc = $mysqli;
                $res=$mysqli->query("SELECT * FROM users");
                while($row=$res->fetch_array())
                {
                ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                }
                ?>
                </select><br />

                </div>


            <div class="form-group">
                <label>Date</label>
                <input type="datetime-local" name="datetime" class="form-control" value="<?php echo date('Y-m-d\TH:i') ?>">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="save">Create</button>
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an articles? <a href="article_view.php">Click here</a>.</p>
        </form>
    </div>    
</body>
</html>