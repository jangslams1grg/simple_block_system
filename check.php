<!DOCTYPE html>
<!-- 2020 Fall Web Programming 3 (e) -->
<html>
<head>
<title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }


        header {
        background-color: #666;
        padding: 4px;
        text-align: center;
        font-size: 10px;
        color: white;
        }

        h2 {
    font-size: 24px;
}    </style>
</head>
<body>

<?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
?>
        <div class="wrapper">
        <header>
        <h2>SIMPLE BLOCK SYSTEM</h2>
        </header>        <p>Please fill in your credentials to login.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>UserID</label>
                <input type="text" name="userID" class="form-control" required>
            </div>  

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div
<?php
}else{
    $u = $_POST["userID"];
    $p = $_POST["password"];
    try{
        require("connect.php");
        $result = $conn->query(
            "SELECT * FROM users WHERE userID='{$u}' AND password='{$p}'"
        );
        $r = $result->fetch();
    }catch(PDOException $e){
        die($e->getMessage());
    }
    if($r){
        session_start();
        $validuserid = $row['userID'];
        $_SESSION['valid'] = $validuserid;
        $_SESSION['authId'] = $r['id'];
        $_SESSION['authName'] = $r['name'];

        $validuser = $r['name'];
        $_SESSION['valid'] = $validuser;

       // echo("<h1>Welcome, {$r['name']}! Login Succeeded.</h1>");
       // header('Location: dashboard.php');
        //header("Location: dashboard.php"); 

    }
    
    
    //else{
     //   echo("<h1>Login failed.</h1>");
   // }

   else {
    echo "<h1>Login Failed.</h1>";
    echo "<br/>";
    echo "<a href='check.php'>Go back</a>";
}
if(isset($_SESSION['valid'])) {
    header('Location: index.php');            
}
}
?>
</body>
</html>