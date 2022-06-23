<?php

define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");
//define("DATABASE_PASSWORD", "password");

$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// To select one particular database to be used
mysqli_select_db($conn, "umpvi") or die("Could not open database");

//set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
