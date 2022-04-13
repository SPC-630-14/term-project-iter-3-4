<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    unset($_SESSION['orderVar']);
}
// Parse Input 
$postdata = file_get_contents("php://input");
$json = json_decode($postdata, true);


$_SESSION['orderVar']['totalCost'] = $json[0]['totalCost'];
$_SESSION['orderVar']['totalQuantity'] = $json[0]['totalQuantity'];
$_SESSION['orderVar']['totalWeight'] = $json[0]['totalWeight'];

http_response_code( 200 );
echo json_encode(  
                    [ "orderVars" => $_SESSION['orderVar'] ] );
?>
