<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();

    if (isset($_SESSION['loggedUser'])){
        $user = $_SESSION['loggedUser'];
        http_response_code ( 200 );
        echo json_encode( [ 'user' => $user ] );
  
    }
    else {
        http_response_code ( 406 );
     }
}
else {
    http_response_code ( 406 );
}
?>