<?php
// File: config.php

/*
 * This file contains your database configuration settings.
 * It establishes a connection to the MySQL database.
 */

// --- Database Credentials ---
// These are the default credentials for a local XAMPP server.
// Change them if your setup is different.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', ''); 
define('DB_NAME', 'food_maverik_db'); // The database name you chose in Step 1

// --- Attempt to connect to the MySQL database ---
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// --- Check the connection ---
// If the connection fails, stop the script and display an error.
if ($conn->connect_error) {
    die("ERROR: Database connection failed. " . $conn->connect_error);
}
?>