<?php
$user = "CREATE TABLE User (
    userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    telephone VARCHAR(12) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    address VARCHAR(50) NOT NULL,
    loginID VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    balance DEC(10,2) DEFAULT 0.00,
    type VARCHAR(25) DEFAULT 'User'
    )";

$truck = "CREATE TABLE Truck (
    truckID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    truckCarrier VARCHAR(30) NOT NULL,
    availabilityCode VARCHAR(30) NOT NULL
    )";

$manufacturer = "CREATE TABLE Manufacturer (
    manufacturerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    corporateTelephone VARCHAR(12) NOT NULL,
    email VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL
    )";

$store = "CREATE TABLE Store (
    storeID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(100) NOT NULL,
    UNIQUE (address)
    )";

$item = "CREATE TABLE Item (
    itemID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    catalogueID VARCHAR(5) NOT NULL UNIQUE,
    itemName VARCHAR(30) NOT NULL,
    cost DEC(10,2) NOT NULL,
    manufacturerID INT(6) UNSIGNED,
    weight  DEC(10,2) NOT NULL,
    length  DEC(10,2) NOT NULL,
    width  DEC(10,2) NOT NULL,
    height  DEC(10,2) NOT NULL,
    colour VARCHAR(30) NOT NULL,
    image VARCHAR(255) NOT NULL,
    CONSTRAINT FK_MI FOREIGN KEY (manufacturerID) REFERENCES Manufacturer(manufacturerID)
    )";

$shopping = "CREATE TABLE Shopping (
    receiptID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    storeID INT(6) UNSIGNED,
    totalPrice DEC(10,2),
    userID INT(6) UNSIGNED,
    status VARCHAR(25) DEFAULT 'In-Progress',
    CONSTRAINT FK_SS FOREIGN KEY (storeID) REFERENCES Store(storeID),
    CONSTRAINT FK_US FOREIGN KEY (userID) REFERENCES User(userID)
    )";

$cart = "CREATE TABLE Cart (
    cartID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    receiptID INT(6) UNSIGNED,
    catalogueID VARCHAR(5) NOT NULL,
    quantity INT(2) DEFAULT 1 NOT NULL,
    CONSTRAINT FK_SC FOREIGN KEY (receiptID) REFERENCES Shopping(receiptID),
    CONSTRAINT FK_IC FOREIGN KEY (catalogueID) REFERENCES Item(catalogueID)
    )";

$trip = "CREATE TABLE Trip (
    tripID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    truckID INT(6) UNSIGNED,
    type VARCHAR(100),
    sourceAddress VARCHAR(100),
    destinationAddress VARCHAR(100),
    distance DEC(10,2),
    cost DEC(10,2),
    CONSTRAINT FK_TT FOREIGN KEY (truckID) REFERENCES Truck(truckID),
    CONSTRAINT FK_ST FOREIGN KEY (sourceAddress) REFERENCES Store(address)
    )";

$order = "CREATE TABLE Ordered (
    orderID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(6) UNSIGNED,
    transactionID VARCHAR(100) UNIQUE,
    tripID INT(6) UNSIGNED,
    receiptID INT(6) UNSIGNED,
    totalCost DEC(10,2),
    dateIssued VARCHAR(30),
    dateEstimate VARCHAR(30),
    dateReceived VARCHAR(30),
    CONSTRAINT FK_UP FOREIGN KEY (userID) REFERENCES User(userID),
    CONSTRAINT FK_TO FOREIGN KEY (tripID) REFERENCES Trip(tripID),
    CONSTRAINT FK_SO FOREIGN KEY (receiptID) REFERENCES Shopping(receiptID)
    )";

$payment = "CREATE TABLE Payment (
    paymentID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    transactionID VARCHAR(100),
    date VARCHAR(100),
    type VARCHAR(100),
    balance FLOAT(6,2),
    changeInBalance FLOAT(6,2),
    cardID INT(6) UNSIGNED,
    CONSTRAINT FK_CP FOREIGN KEY (cardID) REFERENCES Card(cardID),
    CONSTRAINT FK_PO FOREIGN KEY (transactionID) REFERENCES Ordered(transactionID)
    )";


$coord = "CREATE TABLE Coordinates (
    address VARCHAR(100)PRIMARY KEY,
    latitude VARCHAR(100),
    longitude VARCHAR(100)
    )";

$card = "CREATE TABLE Card (
    cardID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userID INT(6) UNSIGNED,
    nameOnCard VARCHAR(100),
    creditCardNumber VARCHAR(16),
    expirationDate VARCHAR(10),
    CVC INT(3),
    status VARCHAR(100), 
    CONSTRAINT FK_IOP FOREIGN KEY (userID) REFERENCES User(userID)
    )";


$createTables = array ($user,$truck,$manufacturer,$store,$item,$shopping,$cart,$trip,$order,$coord,$card,$payment );

?>
