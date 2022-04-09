<?php

$str = file_get_contents("php://input");
$json = json_decode($str, true);
$type = $json['type'];


include_once('sqlFunctions.php');

$conn = connectDB();
$result = $conn -> query("SELECT * FROM Item WHERE catalogueID LIKE '%$type%'");

$index = 1;
$data = Array();

while (($row = $result->fetch_assoc())){
    $image = $row['image'];
    $itemName = $row['itemName'];
    $cost = $row['cost'];
    $weight = $row['weight'];
    $length = $row['length'];
    $height = $row['height'];
    $colour = $row['colour'];

    $hold = Array(
       'image' => $image,
        'itemName' => $itemName,
        'cost' => $cost,
        'weight' => $weight,
        'length' => $length,
        'height' => $height,
        'colour' => $colour,
        'index' => $index,
        'type' => $type
    );
    array_push($data,$hold);
    $index++;
}

http_response_code (200);
$finalData[] = Array ( "items" => $data);
echo json_encode( [ 'items' => $finalData  ] );


?>