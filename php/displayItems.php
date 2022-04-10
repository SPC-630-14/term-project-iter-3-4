<?php

include_once('sqlFunctions.php');

$conn = connectDB();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

$receiptID = $_SESSION['shoppingID'];
$retrieve = "SELECT catalogueID, quantity FROM Cart WHERE receiptID = '$receiptID'";
$result = $conn->query($retrieve);

$data = Array();

if ($result->num_rows > 0) {
    $cartArray = array();

    while($row = $result->fetch_assoc()) {
        $catQuant = array ($row['catalogueID'], $row['quantity']);
        array_push($cartArray, $catQuant);
    }

    $subTotal = 0;

    foreach ($cartArray as $duo) {
        $access = "SELECT * FROM Item WHERE catalogueID = '$duo[0]'";
        $result2 = $conn->query($access);

        if ($result2->num_rows>0) {
            while ($row2 = $result2->fetch_assoc()) {
                $image = $row2['image'];
                $itemName = $row2['itemName'];
                $cost = $row2['cost'];

                $hold = Array(
                    'image' => $image,
                    'itemName' => $itemName,
                    'cost' => $cost,
                    'quantity' => $duo[1],
                 );
            }
            array_push($data,$hold);
        }
    }

}


http_response_code (200);
$finalData[] = Array ( "items" => $data);
echo json_encode( [ 'items' => $finalData  ] );
?>