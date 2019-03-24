<?php
include_once('../models/response.php');
include_once('../models/response_fail.php');
include_once('../models/response_succes.php');

$t = new ResponseSuccess("erreur", true, "text");


echo (json_encode($t));

$user_name = $_POST['user_name'];
$user_lastname = $_POST['user_lastname'];
$mail = $_POST ['mail'];


 $connect = new PDO("mysql:dbname=commentaires", 'root', '0000');
 $query = "INSERT INTO user(name, first_name, mail)
 VALUES ('$user_name', '$user_lastname', '$mail')";

$statement = $connect->prepare($query);
$statement->execute();

//echo $connect->lastInsertId();
?>