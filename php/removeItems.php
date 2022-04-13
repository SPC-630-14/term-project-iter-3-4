<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('sqlFunctions.php');


clearCart($_SESSION['shoppingID']);


?>