<?php
    session_start();
    $authName = $_SESSION['authName'] ?? 'guest';

 if(!isset($_SESSION['authId'])) {
    header('Location: check.php');
}
?>

<?php
require_once('connect.php');
require_once('utils.php');
?>

<html>
<head>
    <title>M19W7382-Gurung Janga Bir Lama</title>
    <link href="style1.css" rel="stylesheet" type="text/css">
</head>
 
<body>
    <div id="header">
        Welcome To Home Page!
    </div>
    <?php
    $user = [];
    if(isset($_SESSION['valid'])) {
        $userID = $_SESSION["authId"];         
        try{
            $query = $conn->query("SELECT * FROM users where id='{$userID}'");
            $result = $query->fetch();
            if(!empty($result['id'])){
                $user = $result;
            }
        }catch(PDOException $e){
            die($e->getMessage());
            header('location:not_authorized.php');
        }
    ?>                
        Welcome <?php echo $_SESSION['authName'] ?> 
        <br/>
        <a href='index.php'>Home</a> | <a href='user_view.php'>View User</a> | <a href='artical_search.php'>Search Article</a> | <a href='read.php'>View Article</a> | <a href='add_article.php'>Add Article</a> | <a href='logout.php'>Logout</a>

        <br/><br/>
    <?php    
    } else {
        header('location:not_authorized.php');
    }
    ?>
    <div id="footer">
        Created by <a href="#" title="Gurung Janga">Gurung Janga Bir Lama</a>
    </div>
</body>
</html>
