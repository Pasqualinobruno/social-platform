<?php
//1 ci connettiamo al database
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'db-social-platform');

//2 mi collego al databese
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

//3 controllo che non ci siano errori
if ($connection && $connection->connect_error) {
    echo "Connection failed: " . $connection->connect_error;
    die;
}
