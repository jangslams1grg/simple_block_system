
<?php session_start(); 
?>
 <?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>
 
 <?php
$db = mysqli_connect("localhost","root","mysql","Web3");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($db,$query) or die ( mysqli_error());
header("Location: view_user.php"); 
?>