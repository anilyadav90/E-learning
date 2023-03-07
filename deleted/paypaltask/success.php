<?php 
session_start();
// include confige.php page
include_once 'config.php'; 
// include database connection page
include_once 'db_connect.php';

$pid = $_SESSION['product_id']; 
 
if(isset($_GET['PayerID'])){ 
    echo "<h1>Your Payment has been successfull</h1>";
    $insert = $db->query("UPDATE product SET status='completed' where id='".$pid."'");
}
else{
    echo "<h1>Your Payment has been failed</h1>";
}
session_destroy();
?>
<a href="index_paypal.php">Back to Home</a>