<?php
include ("sqlFunctions.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

$gate = True;

if (isset($_SESSION['startTime'])) {
    $endTime = microtime(true);
    $_SESSION['endTime'] = $endTime;
    $duration = $endTime - $_SESSION['startTime'];
    $hours = (int)($duration/60/60);
    $minutes = (int)($duration/60)-$hours*60;
    $seconds = (int)$duration-$hours*60*60-$minutes*60;
    if ($seconds <= 1) {
        http_response_code( 406 ); 
        echo json_encode( [ 'msg' => "blocked" ] );
        $gate = False;
        exit();
    }
}

if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && $gate == True) {
    $conn = connectDB();

    $errors = '';

    $receiptID = $_SESSION['shoppingID'];
    $catalogueID = $_POST['catalogueID'];

    if ($_POST['type'] == "add") {
        $insertCart = "INSERT INTO Cart (receiptID, catalogueID, quantity) 
        VALUES ( '$receiptID', '$catalogueID', 1)";

        try {
            $conn->query($insertCart);
            $startTime = microtime(true);
            $_SESSION['startTime'] = $startTime;
            http_response_code( 200 ); 
            echo json_encode( [ 'msg' => "lmao" ] );
        }
        catch (Exception $e) {
            http_response_code(406);
            echo json_encode( [ 'msg' => $e ] );
        }
    }



    if ($_POST['type'] == "update") {
        $updateCart = "UPDATE Cart SET quantity = quantity + 1 WHERE catalogueID = '$catalogueID' AND receiptID = '$receiptID'";

        try {
            $conn->query($updateCart);
            $startTime = microtime(true);
            $_SESSION['startTime'] = $startTime;
            http_response_code( 200 ); 
            echo json_encode( [ 'msg' => $_SESSION['startTime'] ] );
        }
        catch (Exception $e) {
            http_response_code(406);
            echo json_encode( [ 'msg' => $e ] );
        }
    }

    // http_response_code(200);
    // echo json_encode(['msg' => $_POST]);
    }

else{
    http_response_code(406);
}
?>