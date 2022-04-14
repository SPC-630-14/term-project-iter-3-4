<?php 
include ("sqlFunctions.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = connectDB();

if ( !empty($_POST) && $_SERVER["REQUEST_METHOD"] === 'POST' && !empty($_POST['action']) && $_POST['action'] === 'reviews') {
 
    $errors = '';

    $user = $_SESSION['userID'];

    $itemReview = $_POST['itemReview'];
    $rating = $_POST['rating'];
    $description = $_POST['description-review'];


    if (empty($errors)){

        $newinsertReview =
            "INSERT INTO Review (userID, description, rating, service) 
                VALUES ($user, '$description', '$rating', '$itemReview')";
 
        try {
            $conn->query($newinsertReview);            
            http_response_code( 200 ); 
            echo json_encode( [ 'msg' => "Successfully inserted Review" ] );
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

