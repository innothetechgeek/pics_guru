<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'geminibeauty');
// define('DB_USERNAME', 'jnztesti_gemini');
// define('DB_PASSWORD', '18421@dmin!');
// define('DB_NAME', 'jnztesti_gemini');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    
    require('error.html');
    exit;
}
?>