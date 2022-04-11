<?php

include_once('sqlFunctions.php');

$conn = connectDB();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
$data1 = Array();
$data2 = Array();
$data3 = Array();

if ($conn) {
    $retrieve = "SELECT * FROM Store";
    $result = $conn->query($retrieve);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $address = $row['address'];
            $hold = Array(
                'address' => $address,
             );
             array_push($data1,$hold);
        }
    }
}

if ($conn) {
    $retrieve = "SELECT * FROM Truck";
    $result = $conn->query($retrieve);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $carrier = $row['truckCarrier'];
            $hold = Array(
                'carrier' => $carrier,
             );
             array_push($data2,$hold);
        }
    }
}

$user = $_SESSION['userID'];
if ($conn) {
    $retrieve = "SELECT * FROM card WHERE userID = $user";
    $result = $conn->query($retrieve);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $creditCard = substr($row['creditCardNumber'],12,4);
            $hold = Array(
                'payment' => $creditCard,
             );
             array_push($data3,$hold);
        }
    }
}

http_response_code (200);
$finalData[] = Array ( "addresses" => $data1, "carriers" => $data2, "paymentMethods" => $data3);
echo json_encode( [ 'items' => $finalData  ] );
?>