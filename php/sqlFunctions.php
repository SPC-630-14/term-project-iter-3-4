<?php

function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "termproject";
    try {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        return $conn;
    }
    
    catch (Exception $e) {
        echo "Cannot connect to server: " . $e->getMessage();
        return False;
    }

}

function generalQuery($query) {
    $conn = connectDB();
    if ($conn) {
        foreach ($query as $table) {
            try {
                $conn->query($table);
            }
            catch (Exception $e) {
                echo "ERROR: " . $e->getMessage();
                echo "<br>";
            }
        }
    }
    else {
        echo "could not connect";
    }
}

function showQuery($query) {
    $conn = connectDB();
    if ($conn) {
        foreach ($query as $table) {
            try {
                $result = $conn->query($table);
                if ($result->num_rows > 0) {
                    echo "<table>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach($row as $item) {
                            echo "<td>" . $item . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                
            }
            catch (Exception $e) {
                echo "ERROR: " . $e->getMessage();
                echo "<br>";
            }
        }
    }
    else {
        echo "could not connect";
    }
}

function retrieveValidLogins() {
    $conn = connectDB();
    if ($conn) {

        $showLogin = "SELECT loginID, password, type, userID, address FROM User";
        $result = $conn->query($showLogin);

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['validLogins'] = array ();
        while ($row = $result->fetch_assoc()) {
            $appending = array ($row['loginID'],$row['password'], $row['type'], $row['userID'], $row['address']);
            if (!(in_array($appending, $_SESSION['validLogins']))) {
                array_push($_SESSION['validLogins'], $appending);
            }
        }
    }
    else {
        echo "could not connect";
    }
}

function createNewLogin($firstName, $lastname, $telephone, $email, $address, $loginID, $password) {
    $conn = connectDB();
    if ($conn) {

        $newLogin = "INSERT INTO User (firstname, lastname, telephone, email, address, loginID, password) 
        VALUES ('$firstName', '$lastname', '$telephone', '$email', '$address', '$loginID', '$password')";

        try {
            $conn->query($newLogin);
            return True;
        }
        catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
            echo "<br>";
            return False;
        }

    }
    else {
        echo "could not connect";
        return False;
    }
}

function startShoppingSession($userID) {
    $conn = connectDB();

    if ($conn) {
        $check = "SELECT userID FROM Shopping WHERE status = 'In-Progress' AND userID = '$userID'";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            resumeShoppingSession($userID);
        }
        else {
            initializeShoppingSession($userID);
        }
    }
    else {
        echo "could not connect";
    }
}

function resumeShoppingSession($userID) {
    $conn = connectDB();

    if ($conn) {
        $resume = "SELECT receiptID from Shopping WHERE userID = '$userID' AND status = 'In-Progress'";
        $result = $conn->query($resume);
        while ($row = $result->fetch_assoc()) {
            $_SESSION['shoppingID'] = $row['receiptID'];
        }
    }
    else {
        echo "could not connect";
    }
}

function initializeShoppingSession($userID) {
    $conn = connectDB();

    if ($conn) {
        $init = "INSERT INTO Shopping (userID)
            VALUES ('$userID')";
        
        try {
            $conn->query($init);
            resumeShoppingSession($userID);
            return True;
        }
        catch (Exception $e) {
            echo "<br>";
            echo "<br>";
            echo "ERROR: " . $e->getMessage();
            echo "<br>";
            return False;
        }
    }
    else {
        echo "could not connect";
    }
}


function saveCart($receiptID,$catalogueID, $quantity) {
    $conn = connectDB();
    
    if ($conn) {

        $check = "SELECT * FROM Cart WHERE catalogueID = '$catalogueID' AND receiptID = '$receiptID'";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            $init = "UPDATE Cart SET quantity = '$quantity' WHERE catalogueID = '$catalogueID' AND receiptID = '$receiptID'";
        }
        else {
            $init = "INSERT INTO Cart (receiptID, catalogueID, quantity)
                VALUES ('$receiptID','$catalogueID','$quantity')";
        }


        try {
            $conn->query($init);
        }
        catch (Exception $e) {
            echo "<br>";
            echo "<br>";
            echo "ERROR: " . $e->getMessage();
            echo "<br>";
            echo $receiptID." ".$catalogueID. " " . $quantity;
            return False;
        }
    }
    else {
        echo "could not connect";
    }
}

function displayCart($receiptID) {
    $conn = connectDB();

    if ($conn) {

        $retrieve = "SELECT catalogueID, quantity FROM Cart WHERE receiptID = '$receiptID'";
        $result = $conn->query($retrieve);

        if ($result->num_rows > 0) {

            $cartArray = array ();

            while ($row = $result->fetch_assoc()) {
                $catQuant = array ($row['catalogueID'], $row['quantity']);
                array_push($cartArray, $catQuant);
            }

            foreach ($cartArray as $duo) {
                $access = "SELECT * FROM Item WHERE catalogueID = '$duo[0]'";

                $result2 = $conn->query($access);

                if ($result2->num_rows >0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $price = $row2['cost'];
                        $name = $row2['itemName'];
                        $image = $row2['image'];
                        echo "<li class=\"items\" data-id=\"$duo[0]\" id=\"$duo[0]\" data-price=\"$price\" data-quantity=\"$duo[1]\">";
                        echo "<img class=\"all-product-images\" src=\"$image\"><br>";
                        echo "<h1>$name</h1><br>";
                        echo "<span>$price</span><br>";
                        echo "<input type=\"hidden\" name=\"$duo[0]\" data-id=\"$duo[0]\" value=\"$duo[1]\">";
                        echo "<span class=\"quantity\"> x ".$duo[1]."</span>";
                        echo "<span class=\"sub-total\"> = ".$price * $duo[1]."</span>";
                        echo "</li>";
                    }
                }
            }
        }

    }
}

function reviewCart($receiptID) {
    $conn = connectDB();

    if ($conn) {

        $retrieve = "SELECT catalogueID, quantity FROM Cart WHERE receiptID = '$receiptID'";
        $result = $conn->query($retrieve);

        if ($result->num_rows > 0) {

            $cartArray = array ();

            while ($row = $result->fetch_assoc()) {
                $catQuant = array ($row['catalogueID'], $row['quantity']);
                array_push($cartArray, $catQuant);
            }
            $subTotal = 0;
            foreach ($cartArray as $duo) {
                $access = "SELECT * FROM Item WHERE catalogueID = '$duo[0]'";

                $result2 = $conn->query($access);
                $costAccumulator = 0;
        
                if ($result2->num_rows >0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $price = $row2['cost'];
                        $name = $row2['itemName'];
                        $image = $row2['image'];
                        $costAccumulator = $price * $duo[1];
                        echo "<li class=\"Reviewitems\">";
                        echo "<img class=\"review-product-images\" src=\"$image\"><br>";
                        echo "<span>$name</span><br>";
                        echo "<span>$$price</span>";
                        echo "<span class=\"quantity\"> x ".$duo[1]."</span>";
                        echo "<span class=\"sub-total\"> = $".$price * $duo[1]."</span>";
                        echo "</li>";
                    }
                    $subTotal += $costAccumulator;
    
                }
            }
            echo "<p name=\"totalCost\">Total Price: $" . $subTotal . "</p>";
            setShoppingTotalCost($subTotal);
        }

    }
}

function reviewFinalCart($receiptID) {
    $conn = connectDB();

    if ($conn) {

        $retrieve = "SELECT catalogueID, quantity FROM Cart WHERE receiptID = '$receiptID'";
        $result = $conn->query($retrieve);

        if ($result->num_rows > 0) {

            $cartArray = array ();

            while ($row = $result->fetch_assoc()) {
                $catQuant = array ($row['catalogueID'], $row['quantity']);
                array_push($cartArray, $catQuant);
            }
            $subTotal = 0;
            foreach ($cartArray as $duo) {
                $access = "SELECT * FROM Item WHERE catalogueID = '$duo[0]'";

                $result2 = $conn->query($access);
                $costAccumulator = 0;
        
                if ($result2->num_rows >0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $price = $row2['cost'];
                        $name = $row2['itemName'];
                        $image = $row2['image'];
                        $costAccumulator = $price * $duo[1];
                        echo "<li class=\"Reviewitems\">";
                        echo "<img style=\"width:300px; height:300px\" class=\"review-product-images\" src=\"$image\"><br>";
                        echo "<span>$name</span><br>";
                        echo "<span>$$price</span>";
                        echo "<span class=\"quantity\"> x ".$duo[1]."</span>";
                        echo "<span class=\"sub-total\"> = $".$price * $duo[1]."</span>";
                        echo "</li>";
                    }
                    $subTotal += $costAccumulator;
    
                }
            }
            echo "<p name=\"totalCost\">Total Price: $" . $subTotal +50 . "</p>";
            setShoppingTotalCost($subTotal);
        }

    }
}

function setShoppingTotalCost($cost) {
    $conn = connectDB();
    if ($conn) {
        $receiptID = $_SESSION['shoppingID'];
        $update = "UPDATE Shopping SET totalPrice = '$cost' WHERE receiptID = '$receiptID'";

        try {
            $conn->query($update);
        }

        catch (Exception $e) {
            echo "<br>";
            echo "<br>";
            echo "ERROR: " . $e->getMessage();
            echo "<br>";
        }
    }
}

function setStore($address) {
    $conn = connectDB();
    if ($conn) {
        $receiptID = $_SESSION['shoppingID'];
        $find = "SELECT * FROM Store WHERE address ='$address'";
        $result = $conn->query($find);

        if ($result->num_rows>0) {
            while ($rows = $result->fetch_assoc()) {
                $storeID = $rows['storeID'];
                break;
            }


            $update = "UPDATE SHOPPING SET storeID = '$storeID' WHERE receiptID ='$receiptID'";

            try {
                $conn->query($update);
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
}

function clearCart($receiptID) {
    $conn = connectDB();

    if ($conn) {
        $delete = "DELETE FROM Cart WHERE receiptID = '$receiptID'";
        try {
            $conn->query($delete);
            http_response_code (200);
            echo json_encode( [ 'mgs' => "success"  ] );
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

function storeSelector() {
    $conn = connectDB();

    if ($conn) {
        $retrieve = "SELECT * FROM Store";
        $result = $conn->query($retrieve);

        if ($result->num_rows > 0) {
            echo "<select class=\"store-Branch-Select\"  name=\"store\">";
            while ($row = $result->fetch_assoc()) {
                $address = $row['address'];
                echo "<option value=\"$address\">$address</option>";

            }
            echo "</select>";
        }
    }
}

function carrierSelector() {
    $conn = connectDB();

    if ($conn) {
        $retrieve = "SELECT * FROM Truck";
        $result = $conn->query($retrieve);

        if ($result->num_rows > 0) {
            echo "<select name=\"truckCarrier\">";
            while ($row = $result->fetch_assoc()) {
                $carrier = $row['truckCarrier'];
                echo "<option value=\"$carrier\">$carrier</option>";

            }
            echo "</select>";
        }
    }
}

function createTrip($carrierID, $sourceAddress,$destinationAddress) {
    $conn = connectDB();
    
    if ($conn) {
        $find = "SELECT truckID FROM truck WHERE truckCarrier ='$carrierID' AND availabilityCode = 'YES'";
        $result = $conn->query($find);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $truckID = $row['truckID'];
                break;
            }

            $insert = "INSERT INTO Trip (truckID, sourceAddress, destinationAddress) 
                VALUES ('$truckID', '$sourceAddress', '$destinationAddress')";
            try {
                $conn->query($insert);
                $findTrip = "SELECT tripID FROM Trip ORDER BY tripID DESC LIMIT 1";
                $result2= $conn->query($findTrip);

                if ($result2->num_rows > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        $_SESSION['tripID'] = $row['tripID'];
                        break;
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
}

function setDistanceCost($tripID, $distance) {
    $conn = connectDB();
    if ($conn) {
        $distance = "UPDATE Trip SET distance = '$distance' WHERE tripID = '$tripID'";
        $cost = "UPDATE Trip SET cost = '50.00 WHERE tripID = '$tripID'";
        try {
            $conn->query($distance);
        }

        catch (Exception $e) {
            echo "<br>";
            echo "<br>";
            echo "ERROR: " . $e->getMessage();
            echo "<br>";
        }
    }
}

function getTotalCost($receiptID) {
    $conn = connectDB();
    if ($conn) {
        $cost = "SELECT * from Shopping WHERE receiptID ='$receiptID'";
        $result = $conn->query($cost);

        if ($result->num_rows>0) {
            while ($rows = $result->fetch_assoc()) {
                return $rows['totalPrice'];
            }
        }
    }
}


function completeOrder($receiptID, $userID, $dateEstimate) {
    $conn = connectDB();

    date_default_timezone_set('America/Toronto');
    $dateIssued = date('Y-m-d  | H:i');
    $tripID =  $_SESSION['tripID'];
    $totalCost = getTotalCost($receiptID);

    if ($conn) {

        $insert = "INSERT INTO Ordered (userID, tripID, receiptID, totalCost,dateIssued, dateEstimate)
        Values ('$userID','$tripID','$receiptID','$totalCost','$dateIssued','$dateEstimate')";
        try {
            $conn->query($insert);
            unset($_SESSION['tripID']);

            $close = "UPDATE Shopping SET status= 'Closed' WHERE receiptID = '$receiptID'";

            try {
                $conn->query($close);
                startShoppingSession($_SESSION['userID']);
            }

            catch (Exception $e) {
                echo "<br>";
                echo "<br>";
                echo "ERROR: " . $e->getMessage();
                echo "<br>";
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

function getLatitude($address) {
    $conn = connectDB();
    $trying = "SELECT * FROM Coordinates WHERE address ='$address'";
    $result = $conn->query($trying);
    if ($conn) {
        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()) {
                return $row['latitude'];
            }
        }
    }
}

function getLongitude($address) {
    $conn = connectDB();
    $trying = "SELECT * FROM Coordinates WHERE address ='$address'";
    $result = $conn->query($trying);
    if ($conn) {
        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()) {
                return $row['longitude'];
            }
        }
    }
}

function getDistance($addressFrom, $addressTo, $unit = ''){
    // Google API key
    $apiKey = 'AIzaSyCu5lfwgwKs59CTuHwMfOKmE83QVDwmLT4';
    
    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo);
    
    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
    $outputFrom = json_decode($geocodeFrom);
    if(!empty($outputFrom->error_message)){
        return $outputFrom->error_message;
    }
    
    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);
    if(!empty($outputTo->error_message)){
        return $outputTo->error_message;
    }
    
    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    
    // Calculate distance between latitude and longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;
    
    // Convert unit and return distance
    $unit = strtoupper($unit);
    if($unit == "K"){
        return round($miles * 1.609344, 2).' km';
    }elseif($unit == "M"){
        return round($miles * 1609.344, 2).' meters';
    }else{
        return round($miles, 2).' miles';
    }
}


?> 