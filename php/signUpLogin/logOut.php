<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if (isset($_SESSION['loggedUser'])){
    unset($_SESSION['loggedUser']);
    unset($_SESSION['userType']);
    unset($_SESSION['userID']);
    unset($_SESSION['shoppingID']);
    unset($_SESSION['userAddress']);
    http_response_code ( 200 );
  }
else {
  http_response_code ( 406 );
}
?>