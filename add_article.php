<?php
session_start();
require_once('db_connect.php');

$authName = $_SESSION['authName'] ?? 'guest';
if(!isset($_SESSION['authId'])) {
header('Location: check.php');
}
  //$db = mysqli_connect('localhost', 'root', 'mysql', 'Web3');
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

        #blink {
        font-size: 30px;
        font-weight: bold;
        font-family: sans-serif;
        color: #1c87c9;
        transition: 0.4s;
      }

    </style>
</head>
<body>
<div class="page-header">
  <p id="blink"><?php echo htmlspecialchars($_SESSION["authName"]); ?></b>. Welcome to our site.</p>
    </div>
    <b> 
    <a href='index.php'>Home</a> | <a href='user_view.php'>View User</a> | <a href='artical_search.php'>Search Article</a> | <a href='read.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='logout.php'>Logout</a>
    </b>
    <div class="wrapper">
        <h2>Add Article</h2>
        <p>Please fill this form to create an <b>Article.</b></p>

        <?php
            if(isset($_POST['save'])) {

                //get the userID and comment entered by user
                $author = $_SESSION['authId'];
                $subject = $_POST['subject'];
                $body = $_POST['body'];
                //$category = $_POST['category'];
                $date = $_POST['datetime'];
                //connect to the database
                $dbc = $mysqli;
                //insert results from the form input
                $query = "INSERT IGNORE INTO articles(subject,body,author,modified) VALUES('$subject', '$body', '$author', '$date')";
                $result = mysqli_query($dbc, $query) or die('Error querying database.');
                mysqli_close($dbc);
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


<!--
            <div class="form-group">
                <label>Category</label><br>
                <select name="category">
                    <option value="Architecture" selected> Architecture</option>
                    <option value="Java">Java</option>
                    <option value="Mathematics"> Mathematics</option>
                </select>
            </div>-->

            <div class="form-group">
                <label>Date</label>
                <input type="datetime-local" name="datetime" class="form-control" value="<?php echo date('Y-m-d\TH:i') ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="save">Create</button>
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an articles? <a href="artical_search.php">Click here</a>.</p>
        </form>
    </div>    

    <script type="text/javascript">
      var blink = document.getElementById('blink');
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
      }, 1000);
    </script>
  </body>

</body>
</html>