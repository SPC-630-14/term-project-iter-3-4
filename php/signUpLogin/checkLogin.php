<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if (isset($_SESSION['loggedUser'])){
  http_response_code ( 200 );
  echo json_encode(["status" => "clear"]);
  }
else {
  http_response_code ( 200 );
  echo json_encode(["status" => "closed"]);
}
?>