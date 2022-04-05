<?php

if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'registration' ) {
 
    $errors = '';
  
    $firstName = $_POST['firstName'];
    if ( empty($_POST['firstName']) ) {
       $errors .= '<li>First Name is required</li>';
    }
  
    $lastName = $_POST['lastName'];
    if ( empty($_POST['lastName']) ) {
       $errors .= '<li>Last Name is required</li>';
    }

    $username = $_POST['username'];
    if ( empty($_POST['username']) ) {
       $errors .= '<li>Username is required</li>';
    }

    $password = $_POST['password'];
    if ( empty($_POST['password']) ) {
       $errors .= '<li>Password is required</li>';
    }
  
    $email = $_POST['emailAddress'];
    if ( empty($_POST['emailAddress']) ) {
       $errors .= '<li>Email is required</li>';
    }
  
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
       $errors .= '<li>Invalid E-mail address</li>';
    }

    $phoneNumber = $_POST['phoneNumber'];
    if ( empty($_POST['phoneNumber']) ) {
       $errors .= '<li>Phone Number is required</li>';
    }

    $mailingAddress = $_POST['mailingAddress'];
    if ( empty($_POST['mailingAddress']) ) {
       $errors .= '<li>Mailing Address is required</li>';
    }
  

  
  
    if ( empty($errors) ) {
  
       http_response_code( 200 );
       echo json_encode( [ 'msg' => 'Your registration has successfully done' ] );
  
    } else {
  
  
       http_response_code( 406 ); 
       echo json_encode( [ 'msg' => $errors ] );
    }
  
 }
?>