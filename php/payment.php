<?php
include ("sqlFunctions.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }


if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'submit' ) {
 
    $errors = '';

    $creditCardNumber = $_POST['creditCardNumber'];
    if ( empty($_POST['creditCardNumber']) ) {
       $errors .= '<li>Credit Card Number is required</li>';
    }
    $expirationDate = $_POST['expirationDate'];
    if ( empty($_POST['expirationDate']) ) {
       $errors .= '<li>Expiration Date is required</li>';
    }
    $nameOnCard = $_POST['nameOnCard'];
    if ( empty($_POST['nameOnCard']) ) {
       $errors .= '<li>Name on Card is required</li>';
    }
    $CVC = $_POST['CVC'];
    if ( empty($_POST['CVC']) ) {
       $errors .= '<li>CVC is required</li>';
    }

    if (empty($errors)) {

        $conn = connectDB();

        $user = $_SESSION['userID'];

        $last4Digits = substr($creditCardNumber, 12,4);

        $salt = base64_encode(random_bytes(12));
        $saltpass = $creditCardNumber.$salt;
        $md5pass = md5($saltpass);


        $newPaymentMethod = "INSERT INTO Card (userID, nameOnCard, creditCardNumber, expirationDate, CVC, salt, last4Digits) 
        VALUES ( '$user', '$nameOnCard ', '$md5pass', '$expirationDate', $CVC, '$salt', '$last4Digits')";


        try {
            $conn->query($newPaymentMethod);
            http_response_code( 200 ); 
            echo json_encode( [ 'msg' => "Get SCAMMED" ] );
        }
        catch (Exception $e) {
            http_response_code(406);
            echo json_encode( [ 'msg' => $e ] );
        }

    }
    else {
        http_response_code( 406 ); 
        echo json_encode( [ 'msg' => $errors ] );
    }




    }
?>