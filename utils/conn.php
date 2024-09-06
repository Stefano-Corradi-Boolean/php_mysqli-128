<?php

define('DB_SERVERNAME', 'localhost:8889');
define('DB_NAME', 'db_university');
define('DB_USER', 'root');
define('DB_PASS', 'root');

try{
  // stabilire la connessione con il database
  $conn = new mysqli(DB_SERVERNAME, DB_USER, DB_PASS, DB_NAME);
}catch(Exception $e){
  header('Location: http://localhost:8888/php_mysqli/error.php');
}