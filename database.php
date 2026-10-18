<?php
$server = 'localhost';
$username = 'root';
$password = '@100842jac';
$dbname = 'login-register';

$conn = new mysqli($server, $username, $password, $dbname, 3306);
 if(!$conn){
 	echo "error:{$conn->connect_error}";
 }
 else{
 	echo "";
 }
?>