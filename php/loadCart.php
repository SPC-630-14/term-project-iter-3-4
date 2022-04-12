<?php
include ("sqlFunctions.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST') {
    $conn = connectDB();

    $errors = '';

    $receiptID = $_SESSION['shoppingID'];
    $catalogueID = $_POST['catalogueID'];

    if ($_POST['type'] == "add") {
        $insertCart = "INSERT INTO Cart (receiptID, catalogueID, quantity) 
        VALUES ( '$receiptID', '$catalogueID', 1)";

        try {
            $conn->query($insertCart);
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
            http_response_code( 200 ); 
            echo json_encode( [ 'msg' => "tank zilean" ] );
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