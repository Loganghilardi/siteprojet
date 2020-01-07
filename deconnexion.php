<?php 
session_start();


$_SESSION = array();
session_destroy();


setcookie('pseudo', '');
setcookie('pass_hache', '');	
header ("Location: http://localhost/sitee/index.php");
/* bah ca coupe la session et les cookies */
