<?php 
// Initialize the session
session_start();
?>
<?php 
// destroy the session
session_destroy();
 
// Redirect to check page
header("location: check.php");

exit;
?>