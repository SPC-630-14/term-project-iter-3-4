<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

echo $_SESSION['loggedUser'] . " <br>";
echo $_SESSION['userID'] . " <br>";
echo $_SESSION['shoppingID'] . " <br>";
echo $_SESSION['userType'] . " <br>";
echo $_SESSION['userAddress'] . " <br>";



?>