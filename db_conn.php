<?php 

$host = "localhost";
$name = "root";
$password = "";
$database = "php_crud";

$conn = mysqli_connect($host, $name, $password,$database);

if(!$conn){
    echo "Connection Failed";
}

?>