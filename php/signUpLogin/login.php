<?php
include ("../sqlFunctions.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'login' ) {
 
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

        retrieveValidLogins();
        foreach ($_SESSION['validLogins'] as $login) {
            // echo $login[0] . " " . $login[1] . "<br>";
            if ($login[0] == $_POST['username'] && $login[1] == $_POST['password']) {
    
                $_SESSION['loggedUser'] = $login[0];
                $_SESSION['userType'] = $login[2];
                $_SESSION['userID'] = $login[3];
                $_SESSION['userAddress'] = $login[4];
                unset($_SESSION['validLogins']);
    
                startShoppingSession($_SESSION['userID']);
                http_response_code( 200 );
                echo json_encode( [ 'msg' => 'Your Logged In!' ] );
    
                exit;
            }
        }
        unset($_SESSION['validLogins']);
        http_response_code( 406 ); 
        echo json_encode( [ 'msg' => $errors ] );
    }
    else {

    http_response_code( 406 ); 
    echo json_encode( [ 'msg' => $errors ] );
    }

    }
?>