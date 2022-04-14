<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("sqlFunctions.php");
$conn = connectDB();


// Make Trip Entry

if ($conn) {
    $carrierID = intval($_SESSION['orderVar']['carrierID']);
    $storeAddress = $_SESSION['orderVar']['storeAddress'];
    $userAddress = $_SESSION['orderVar']['userAddress'];
    $distance = $_SESSION['orderVar']['distance'];
    $cost = $_SESSION['orderVar']['tripCost'];


    $insert = "INSERT INTO Trip (truckID, sourceAddress, destinationAddress, distance, cost) 
    VALUES ($carrierID, '$storeAddress', '$userAddress', '$distance', '$cost')";

    try {
        $conn->query($insert);

        $find = "SELECT * FROM Trip ORDER BY tripID DESC LIMIT 1";

        $result = $conn->query($find);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $_SESSION['tripID'] = $row['tripID'];
            }
        }

    }
    catch (Exception $e) {
        echo "<br>";
        echo "<br>";
        echo "ERROR: " . $e->getMessage();
        echo "<br>";
    }

}


// If assembly == True make new entry, else reuse false entry
if ($_SESSION['orderVar']['assembly'] == true) {

    if ($conn) {
        $assemblyCost = floatval($_SESSION['orderVar']['assemblyCost']);
        $assemblyType = $_SESSION['orderVar']['assemblyType'];


        $insert = "INSERT INTO Assembly (type, cost) VALUES ('$assemblyType', $assemblyCost)";

        try {
            $conn->query($insert);

            $find = "SELECT * FROM Assembly ORDER BY assemblyID DESC LIMIT 1";

            $result = $conn->query($find);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $_SESSION['assemblyID'] = $row['assemblyID'];
                }
            }

        }
        catch (Exception $e) {
            echo "<br>";
            echo "<br>";
            echo "ERROR: " . $e->getMessage();
            echo "<br>";
        }

    }

}
else {
    $_SESSION['assemblyID'] = 1;
}




if ($conn) {

    date_default_timezone_set('America/Toronto');
    $dateIssued = date('Y-m-d H:i:s T');

    $dateEstimate = $_SESSION['orderVar']['deliveryDate'];

    $transactionID = uniqid();

    $totalCost = $_SESSION['orderVar']['assemblyCost'] + $_SESSION['orderVar']['tripCost'] + floatval($_SESSION['orderVar']['totalCost']);

    $receiptID = $_SESSION['shoppingID'];

    $userID = $_SESSION['userID'];

    $assemblyID = $_SESSION['assemblyID'];

    $tripID = $_SESSION['tripID'];



    $insert = "INSERT INTO Ordered (userID, transactionID, tripID, receiptID, assemblyID, totalCost, dateIssued, dateEstimate)
    Values ($userID, '$transactionID', $tripID, $receiptID, $assemblyID, $totalCost, '$dateIssued', '$dateEstimate')";

    try {
        $conn->query($insert);

        $find = "SELECT * FROM Ordered ORDER BY orderID DESC LIMIT 1";

        $result = $conn->query($find);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $_SESSION['orderID'] = $row['orderID'];
            }
        }

    }
    catch (Exception $e) {
        echo "<br>";
        echo "<br>";
        echo "ERROR: " . $e->getMessage();
        echo "<br>";
    }


}

if ($conn) {

    
    $cardID = $_SESSION['orderVar']['payment'];

    $totalCostNegative = $totalCost * -1;

    $insert1 = "INSERT INTO Payment (transactionID, date, type, balance, changeInBalance, cardID)
    Values ('$transactionID','$dateIssued','Credit','$totalCost','$totalCost', $cardID)";
    $insert2 = "INSERT INTO Payment (transactionID, date, type, balance, changeInBalance, cardID)
        Values ('$transactionID','$dateIssued','Debit',0.00,'$totalCostNegative', $cardID)";

    try {
        $conn->query($insert1);
        $conn->query($insert2);

        $find = "SELECT * FROM Payment ORDER BY paymentID DESC LIMIT 1";

        $result = $conn->query($find);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $_SESSION['paymentID'] = $row['paymentID'];
            }
        }

    }
    catch (Exception $e) {
        echo "<br>";
        echo "<br>";
        echo "ERROR: " . $e->getMessage();
        echo "<br>";
    }
}


$_SESSION['orderVar']['transactionID'] = $transactionID;

if ($conn) {
    $receiptID = $_SESSION['shoppingID'];
    $find = "SELECT * FROM Store WHERE address ='$storeAddress'";
    $result = $conn->query($find);

    if ($result->num_rows>0) {
        while ($rows = $result->fetch_assoc()) {
            $storeID = $rows['storeID'];
            break;
        }


        $cartPrice = floatval($_SESSION['orderVar']['totalCost']);

        $update1 = "UPDATE SHOPPING SET storeID = '$storeID' WHERE receiptID ='$receiptID'";
        $update2 = "UPDATE SHOPPING SET totalPrice = $cartPrice WHERE receiptID ='$receiptID'";
        $update3 = "UPDATE Shopping SET status = 'Closed' WHERE receiptID = '$receiptID'";

        try {
            $conn->query($update1);
            $conn->query($update2);
            $conn->query($update3);
            startShoppingSession($_SESSION['userID']);
        }
        catch (Exception $e) {
            echo "<br>";
            echo "<br>";
            echo "ERROR: " . $e->getMessage();
            echo "<br>";
            echo $receiptID." ".$catalogueID. " " . $quantity;
        }
    }



}


http_response_code( 200 );
echo json_encode(  
                    [
                    "trip" => $_SESSION['tripID'],
                    "assembly" => $_SESSION['assemblyID'],
                    "order" => $_SESSION['orderID'],
                    "payment" => $_SESSION['paymentID'] ] );
?>
