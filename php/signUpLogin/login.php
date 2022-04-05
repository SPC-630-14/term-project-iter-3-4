<?php
include ("../sqlFunctions.php");
if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'registration' ) {
 
    $errors = '';

    $username = $_POST['username'];
    if ( empty($_POST['username']) ) {
       $errors .= '<li>Username is required</li>';
    }

    $password = $_POST['password'];
    if ( empty($_POST['password']) ) {
       $errors .= '<li>Password is required</li>';
    }
  
  
    if (empty($errors) ) {

        if (createNewLogin($_POST['firstName'],$_POST['lastName'], $_POST['phoneNumber'], $_POST['emailAddress'], $_POST['mailingAddress'],$_POST['username'],$_POST['password'])) {
            http_response_code( 200 );
            echo json_encode( [ 'msg' => 'Your registration is complete!' ] );
        }
        else {
            http_response_code( 406 ); 
            echo json_encode( [ 'msg' => $errors ] );
        }
    }
    else {

    http_response_code( 406 ); 
    echo json_encode( [ 'msg' => $errors ] );
    }

    }
?>