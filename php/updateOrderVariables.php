<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Parse Input 
$postdata = file_get_contents("php://input");
$json = json_decode($postdata, true);

include_once("sqlFunctions.php");
$conn = connectDB();


// Save Branch
$address = $json['store'];
if ($conn) {
    $retrieve = "SELECT * FROM Store WHERE address = '$address'";
    $result = $conn->query($retrieve);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['branch'] = $row['storeID'];

        }
    }
}

// Save Carrier
$carrier = $json['truck'];
if ($conn) {
    $retrieve = "SELECT * FROM Truck WHERE truckCarrier = '$carrier'";
    $result = $conn->query($retrieve);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['carrierID'] = $row['truckID'];

        }
    }
}

// Save Payment Info
$_SESSION['payment'] = $json['payment'];

// Save DateTime
$date = substr($json['date'],0,10);
$time = substr($json['time'],11,8);
$dt = new DateTime($date.$time);
$dt->setTimezone(new DateTimeZone('America/Toronto'));

$dtSend = $dt->format('Y-m-d H:i:s T');
$_SESSION['dateOrdered'] = $dtSend;

// Save Assembly Info
$_SESSION['assembly'] = $json['assembly'];
$_SESSION['assemblyType'] = $json['assemblyType'];
$_SESSION['description'] = $json['description'];


// Prepare Longitude & Latitude for Send
$storeLAT = getLatitude($address);
$storeLONG = getLongitude($address);

$userLAT = getLatitude($_SESSION['userAddress']);
$userLONG = getLongitude($_SESSION['userAddress']);


// Prepare the Distance & Delivery Cost
$distance = getDistance($address, $_SESSION['userAddress'], "K");

http_response_code( 200 );
echo json_encode(   [ "storeLAT" => $storeLAT,
                    "storeLONG" => $storeLONG,
                    "userLAT" => $userLAT,
                    "userLONG" => $userLONG,
                    "distance" => $distance,
                    "payment" => $_SESSION['payment'],
                    "storeAddress" => $address,
                    "userAddress" => $_SESSION['userAddress'],
                    "assembly" => $_SESSION['assembly'],
                    "assemblyType" => $_SESSION['assemblyType'],
                    "description" => $_SESSION['description']
                    ] );
?>
