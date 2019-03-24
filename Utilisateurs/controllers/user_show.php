<?php


$id = $_POST['id'];

$connec = new PDO("mysql:dbname=commentaires", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $request = $connec->prepare("DELETE FROM user WHERE  id='$id' ");
$request = $connec->prepare("SELECT * FROM user WHERE  id='$id' ");

$request -> execute();

$reponse = $request -> fetch();

echo (json_encode($reponse));

?>
