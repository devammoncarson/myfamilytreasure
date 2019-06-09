<?php

$dsn = 'mysql:host=localhost;dbname=ammoncar_familytreasure';
$username = 'ammoncar_iClient';
$password = '{#)?Z~U5#Unx';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('error.php');
    exit();
}
//iClient Credentials
//ammoncar_iClient
//{#)?Z~U5#Unx
//OTHERWISE
// username is 'root'
// password is ''