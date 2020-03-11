<?php 
include '../lib/session.php';
include '../config/config.php';
	session:: checksession();
include '../lib/Database.php';
include '../helpers/format.php';

?>

<?php
 

    session_unset($_SESSION['username']);
    session::destroy();
    header("location:login.php");

?>



