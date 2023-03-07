<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
/* 
 * PayPal and database configuration 
 */ 
  
// PayPal configuration 
define('PAYPAL_ID', 'sb-4343bz36884719@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
// My PAYPAL_SANDBOX is True because we i want to use paypal in test mode if you want to do this 
// in bussiness mode write False
 

define('PAYPAL_RETURN_URL', 'http://localhost/MiniProject/paypaltask/success.php'); 
// PAYPAL_RETURN_URL in this we will write the link of page in which opage you
//  want to transfer after success payment
define('PAYPAL_CANCEL_URL', 'http://localhost/MiniProject/paypaltask/cancel_paypal.php'); 
// PAYPAL_CANCEL_URL in this we will write the link of page in which opage you
//  want to transfer after cancel  payment
define('PAYPAL_CURRENCY', 'USD'); 
 
// Database configuration 
define('DB_HOST', 'localhost:3308'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'paypal_con'); 
 
// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");