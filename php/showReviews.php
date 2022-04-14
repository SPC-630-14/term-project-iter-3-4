<?php
include ("sqlFunctions.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = connectDB();

if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['actionReviews']) && $_POST['actionReviews'] === 'showReviews') {

    $errors = '';
    $user = $_SESSION['userID'];

    if (empty($errors)){

        try {

            $reviewTable = $conn->query("SELECT userID, description, rating, service FROM Review");

            while (($row = $reviewTable->fetch_assoc())){


                $userID = $row['userID']; //gets userID from TABLE user

                $result = $conn->query("SELECT firstname, lastname FROM User WHERE userID LIKE $userID ");
                $row2 = $result->fetch_assoc();

                $firstname = $row2['firstname'];
                $lastname= $row2['lastname'];
                $serviceReview = $row['service'];
                $ratingReview = $row['rating'];
                $descriptionReview = $row['description'];

                echo "<p id=\"FNLN-container\"> <img src=\"https://img.icons8.com/material/24/000000/user-male-circle--v1.png\"/> <b id=\"FNLN\"> $firstname $lastname </b> </p>";
                echo "<p id=\"IR-container\"> <b> Item Review: </b> $serviceReview </p>";
                echo "<span id=\"Rating-container\"> <b> Rating: </b> $ratingReview/6</span>";
                echo "<p id=\"FB-container\"> <b> Feedback: </b> </p> <p id=\"FB-container\"> $descriptionReview </p>";
                echo "<br> <br> <br>";
                
            }

            http_response_code( 200 );
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