
<?php session_start(); 
require_once("db/config.php");
?>
 <?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
$id=$_REQUEST['id'] ?? 0;
    $statement = $conn -> prepare(
    "DELETE FROM articles WHERE id = :id");
    $statement -> execute( [ ":id" => $id ] );
    header("Location: article_view.php"); 

?>