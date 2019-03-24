<?php


date_default_timezone_set('UTC');
$dayte = date("Y-m-d H:i:s"); 

$commentaire = $_POST["comment"];

echo $commentaire;

 $connect = new PDO("mysql:dbname=commentaires", 'root', '0000');
 $query = "INSERT INTO commentaires (date, content) 
 VALUES ('$dayte', '$commentaire')";

$statement = $connect->prepare($query);
$statement->execute();

?>