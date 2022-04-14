<?php

//Default Insertions
$insertAddress = array (
    "INSERT INTO Coordinates (address, latitude, longitude) 
        VALUES ('92 Holly St, Toronto, ON M4S 3H3, Canada', '43.706658','-79.396858')",
    "INSERT INTO Coordinates (address, latitude, longitude) 
        VALUES ('34 Stanley Greene Blvd, North York, ON M3K 1X1, Canada', '43.733449','-79.478232')",
    "INSERT INTO Coordinates (address, latitude, longitude) 
        VALUES ('12 Bruce Farm Dr, North York, ON M2H 1G3, Canada', '43.798011','-79.380565')",
    "INSERT INTO Coordinates (address, latitude, longitude) 
        VALUES ('Lawrence Ave East at Warden Ave, Toronto, ON M1R 2Z2, Canada', '43.745391','-79.294761')",
    "INSERT INTO Coordinates (address, latitude, longitude) 
        VALUES ('1921 Albion Rd, Etobicoke, ON M9W 5S8, Canada', '43.745144','-79.618865')",
    "INSERT INTO Coordinates (address, latitude, longitude) 
        VALUES ('1107 Avenue Rd, Toronto, ON M5N 3B1', '43.707582','-79.409372')"
);

function generateRandomSalt(){
    return base64_encode(random_bytes(12));
  }

$p = "123";

$salt = generateRandomSalt();
$saltpass = $p.$salt;
$md5pass = md5($saltpass);



$insertUser = array (
    "INSERT INTO User (firstname, lastname, telephone, email, address, loginID, password, type, salt) 
        VALUES ('Georgz', 'Ilagan', '111-111-111', 'georgz.ilagan@ryerson.ca', '92 Holly St, Toronto, ON M4S 3H3, Canada', 'gilagan', '$md5pass','Admin', '$salt')",
    "INSERT INTO User (firstname, lastname, telephone, email, address, loginID, password, type, salt) 
        VALUES ('Ralph', 'Liton', '222-222-222', 'rliton@ryerson.ca', '1107 Avenue Rd, Toronto, ON M5N 3B1', 'rliton', '$md5pass', 'Admin','$salt')",
    "INSERT INTO User (firstname, lastname, telephone, email, address, loginID, password, type, salt) 
        VALUES ('Jacob', 'Rokhvarg', '333-333-333', 'jacob.rokhvarg@ryerson.ca', '1921 Albion Rd, Etobicoke, ON M9W 5S8, Canada', 'jrokhvarg', '$md5pass','Admin', '$salt')"
);

$insertTruck = array (
    "INSERT INTO Truck (truckCarrier, availabilityCode) 
        VALUES ('Purolator', 'YES')",
    "INSERT INTO Truck (truckCarrier, availabilityCode) 
        VALUES ('Store-Owned', 'YES')",
    "INSERT INTO Truck (truckCarrier, availabilityCode) 
        VALUES ('CanadaPost', 'YES')",
    "INSERT INTO Truck (truckCarrier, availabilityCode) 
        VALUES ('DHL', 'YES')",
    "INSERT INTO Truck (truckCarrier, availabilityCode) 
        VALUES ('Store-Owned', 'YES')"
);


$insertManufacturer = array (
    "INSERT INTO Manufacturer (name, corporateTelephone, email, address) 
        VALUES ('Amazon', '676-767-6767', 'loser@amazon.co.bus.ca.com.org', 'whoknows???')",
    "INSERT INTO Manufacturer (name, corporateTelephone, email, address) 
        VALUES ('IKEA', '676-767-6767', 'loser@amazon.co.bus.ca.com.org', 'whoknows???')",
    "INSERT INTO Manufacturer (name, corporateTelephone, email, address) 
        VALUES ('NoName', '676-767-6767', 'loser@amazon.co.bus.ca.com.org', 'whoknows???')"
);

$insertStore = array (
    "INSERT INTO Store (address) 
        VALUES ('34 Stanley Greene Blvd, North York, ON M3K 1X1, Canada')",
    "INSERT INTO Store (address) 
        VALUES ('12 Bruce Farm Dr, North York, ON M2H 1G3, Canada')",
    "INSERT INTO Store (address) 
        VALUES ('Lawrence Ave East at Warden Ave, Toronto, ON M1R 2Z2, Canada')"
);

$insertItemChairs = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHA1','Dining Chair', 9.99, 1, 25.00, 30.00,30.00,50.00,'black', 'aboutUsImages/Furniture/Chairs/DiningChair.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHA2','Office Chair', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Chairs/OfficeChair.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHA3','Lounging Chair', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Chairs/LoungingChair.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHA4','Fold-Up Chair', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Chairs/FoldUpChair.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHA5','Kneeling Chair', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Chairs/KneelingChair.JPG')",
);

$insertItemTables = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('TAB1','Dining Table', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Tables/Dining-Table.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('TAB2','Coffee Table', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Tables/Coffee-Table.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('TAB3','C Table', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Tables/C-Table.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('TAB4','Fold-Up Table', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Tables/Fold-Up-Table.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('TAB5','Heated Table', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Tables/Heated-Table.JPG')",
);

$insertItemSofas = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SOF1','Scandinaivian Sofa', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Sofas/Scandinaivian-Sofa.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SOF2','Mid Century Sofa', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Sofas/Mid-Century-Sofa.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SOF3','Lawson Sofa', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Sofas/Lawson-Sofa.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SOF4','Contemporary Sofa', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Sofas/Contemporary-Sofa.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SOF5','Chaise Sofa', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Furniture/Sofas/Chaise-Sofa.JPG')",
);

$insertItemDrawers = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('DRA1','Bachelor Chest Drawer', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Drawers/Bachelor-Chest-Drawer.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('DRA2','Gentleman Chest Drawer', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Drawers/Gentleman-Chest-Drawer.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('DRA3','Lingerie Chest Drawer', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Drawers/Lingerie-Chest-Drawer.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('DRA4','Media Chest Drawer', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Drawers/Media-Chest-Drawer.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('DRA5','Vertical Chest Drawer', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Drawers/Vertical-Chest-Drawer.JPG')",
);

$insertItemLamps = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('LAM1','Nightstand Lamp', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Lamps/Nightstand-Lamp.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('LAM2','Study Table Lamp', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Lamps/Study-Table-Lamp.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('LAM3','Swing Arm Lamp', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Lamps/Swing-Arm-Lamp.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('LAM4','Two Bulb Lamp', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Lamps/Two-Bulb-Lamp-2.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('LAM5','Marble Base Task Lamp', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Lamps/Marble-Base-Task-Lamp.JPG')",
);

$insertItemChargers = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHG1','ANKER 2 port Charger', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Chargers/ANKER-Charger.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHG2','KOPPLA 5 Port Charger', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Chargers/KOPPLA-5-PORT-Charger.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHG3','KOPPLA 3 port Charger', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Chargers/KOPPLA-Charger.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHG4','ORICO 2 port Charger', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Chargers/ORICO-Charger.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('CHG5','PHILIPS 1 port Charger', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Home Office/Chargers/PHILIPS-Charger.JPG')",
);

$insertItemBedFrames = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BED1','Regular Bed', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Beds/bed.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BED2','Bunk Bed', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Beds/Bunk-Bed.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BED3','Sofa Bed', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Beds/Sofa-Bed.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BED4','Storage Bed', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Beds/Storage-Bed.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BED5','Baby Cot Bed', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Beds/Baby-Cot-Bed.JPG')",
);

$insertItemMattresses = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MAT1','Airbed Mattress', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Mattresses/Airbed-Mattress.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MAT2','Hybrid Mattress', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Mattresses/Hybrid-Mattress.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MAT3','InnerSpring Mattress', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Mattresses/InnerSpring-Mattress.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MAT4','Memory Foam Mattress', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Mattresses/Memory-Foam-Mattress.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MAT5','Natural Latex Mattress', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Mattresses/Natural-Latex-Mattress.JPG')",
);

$insertItemNightStands = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('NST1','Blue Dot Nighstand', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Nightstands/Blu-Dot-Nightstand.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('NST2','Farmhouse Nightstand', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Nightstands/Farmhouse-Nightstand.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('NST3','Jennings Nightstand', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Nightstands/Jennings-Nightstand.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('NST4','Round Nighstand', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Nightstands/Round-Nightstand.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('NST5','WestElm Nightstand', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Beds/Nightstands/West-Elm-Nightstand.JPG')",
);

$insertItemMirrors = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MIR1','Circle Mirror', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Mirrors/Circle-Mirror.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MIR2','Oval Mirror', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Mirrors/Oval-Mirror.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MIR3','Rectangle Mirror', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Mirrors/Rectangle-Mirror.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MIR4','Square Mirror', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Mirrors/Square-Mirror.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('MIR5','Vintage Veritcal Mirror', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Mirrors/Vintage-Vertical-Mirror.JPG')",
);

$insertItemSinks = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SIN1','Drop In Sink', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Sinks/Drop-In-Sink.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SIN2','Grey Farmhouse Sink', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Sinks/Farmhouse-Sink.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SIN3','White Farmhouse Sink', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Sinks/Farmhouse-Sink-2.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SIN4','Grey Undermount Sink', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Sinks/Undermount-Sink.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('SIN5','Silver Undermount Sink', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Sinks/Undermount-Sink-2.JPG')",
);

$insertItemBins = array (
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BIN1','Double Sorting Bin', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Bins/Double-Sorting-Bin.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BIN2','Mini Counter Waste Bin', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Bins/Mini-Counter-Waste-Bin.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BIN3','Beige Press Waste Bin', 9.99, 3, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Bins/Press-Waste-Bin.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BIN4','White Press Waste Bin', 9.99, 1, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Bins/Press-Waste-Bin-2.JPG')",
    "INSERT INTO Item (catalogueID, itemName, cost, manufacturerID, weight, length, width, height, colour, image) 
        VALUES ('BIN5','Pedal Waste Bin', 9.99, 2, 25.00, 30.00,30.00,50.00,'black','aboutUsImages/Bathroom/Bins/Pedal-Waste-Bin.JPG')",
);

$creditCart1 = "1234123412341234";
$creditCart2 = "6262626262626262";
$creditCart3 = "8989898989898989";

$salt1 = generateRandomSalt();
$salt2 = generateRandomSalt();
$salt3 = generateRandomSalt();

$saltpass1 = $creditCart1.$salt;
$saltpass2 = $creditCart2.$salt;
$saltpass3 = $creditCart3.$salt;

$md5pass1 = md5($saltpass1);
$md5pass2 = md5($saltpass2);
$md5pass3 = md5($saltpass3);


$insertCards = array (
    "INSERT INTO Card (userID, nameOnCard, creditCardNumber, expirationDate, CVC, last4Digits, salt) 
        VALUES (1, 'Georgz Ilagan', '$md5pass1', '06/30', 321, '1234', '$salt1')",
    "INSERT INTO Card (userID, nameOnCard, creditCardNumber, expirationDate, CVC, last4Digits, salt) 
        VALUES (2, 'Ralph Liton', '$md5pass2', '06/30', 321, '6262', '$salt2')",
    "INSERT INTO Card (userID, nameOnCard, creditCardNumber, expirationDate, CVC, last4Digits, salt) 
        VALUES (3, 'Jacob Rokhvarg', '$md5pass3', '06/30', 321, '8989', '$salt3')"
);

$insertAssembly = array (
    "INSERT INTO Assembly (assemblyID, type, cost) 
        VALUES (1, 'False', 0.00)");

$insertReview = array (
    "INSERT INTO Review (userID, description, rating, service) 
        VALUES (2, 'Great Review', '6', 'Service A')"
);


?>