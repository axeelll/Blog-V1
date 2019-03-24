<?php

require_once("../models/user_obj.php");


$user_name = $_POST['user_name'];
$user_lastname = $_POST['user_lastname'];
$mail = $_POST ['mail'];
$id = $_POST ['id'];

$connec = new PDO("mysql:dbname=commentaires", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $request = $connec->prepare("DELETE FROM user WHERE  id='$id' ");
$request = ("UPDATE user SET  name = '$user_name', 
                            first_name = '$user_lastname',
                            mail = '$mail'
                            WHERE id = $id ");

$request = $connec-> prepare($request);
$request -> execute();

$request = ("SELECT * FROM user WHERE id= $id");
$prepared_request = $connec -> prepare($request);
$prepared_request-> setFetchMode(PDO::FETCH_CLASS, 'User');
$prepared_request -> execute();

$user_ajax = $prepared_request -> fetch();

echo (json_encode($user_ajax));




?>

