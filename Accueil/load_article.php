<?php

include_once('mod_art.php');

$connec = new PDO("mysql:dbname=commentaires", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $request = $connec->prepare("DELETE FROM user WHERE  id='$id' ");
$prepared_request = $connec->prepare("SELECT * FROM article ORDER BY id DESC LIMIT 3");


$prepared_request-> setFetchMode(PDO::FETCH_CLASS, 'Article');
$prepared_request -> execute();
$reponse = $prepared_request -> fetchAll(); 


echo (json_encode($reponse));

?>
