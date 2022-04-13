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
            $_SESSION['orderVar']['branch'] = $row['storeID'];

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
            $_SESSION['orderVar']['carrierID'] = $row['truckID'];

        }
    }
}

// Save Payment Info
$_SESSION['orderVar']['payment'] = $json['payment'];

// Save DateTime
$date = substr($json['date'],0,10);
$time = substr($json['time'],11,8);
$dt = new DateTime($date.$time);
$dt->setTimezone(new DateTimeZone('America/Toronto'));

$dtSend = $dt->format('Y-m-d H:i:s T');
$_SESSION['orderVar']['dateOrdered'] = $dtSend;

// Save Assembly Info
$_SESSION['orderVar']['assembly'] = $json['assembly'];
$_SESSION['orderVar']['assemblyType'] = $json['assemblyType'];
$_SESSION['orderVar']['description'] = $json['description'];


// Prepare Longitude & Latitude for Send
$_SESSION['orderVar']['storeLAT'] = getLatitude($address);
$_SESSION['orderVar']['storeLONG']= getLongitude($address);

$_SESSION['orderVar']['userLAT'] = getLatitude($_SESSION['userAddress']);
$_SESSION['orderVar']['userLONG'] = getLongitude($_SESSION['userAddress']);

$_SESSION['orderVar']['storeAddress'] = $address;
$_SESSION['orderVar']['userAddress'] = $_SESSION['userAddress'];


// Prepare the Distance & Delivery Cost
$_SESSION['orderVar']['distance'] = getDistance($address, $_SESSION['userAddress'], "K");



http_response_code( 200 );
echo json_encode(   [ "orderVars" => $_SESSION['orderVar'] ] );
?>
