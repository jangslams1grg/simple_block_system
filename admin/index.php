<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="../style1.css" rel="stylesheet" type="text/css">
</head>
 
<body>
    <div id="header">
        Welcome to my page!
    </div>
    <?php
    if(isset($_SESSION['valid'])) {            
        include("db/connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        Welcome <?php echo $_SESSION['name'] ?> ! 
        <br/>
        <a href="index.php">Home</a> | <a href="view_user.php"> View User</a> | <a href='adduser.php'>Add New User</a> | <a href='article_view.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='article_search.php'>Search Article</a> |
        <a href='logout.php'>Logout</a>


        <br/><br/>
    <?php    
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
    }
    ?>
    <div id="footer">
        Created by <a href="http://gurungjangabirlama.com.np" title="JBLG">Gurung Janga Bir Lama</a>
    </div>
</body>
</html>
