<?php


$title = $_POST['title'];
$commentaire = $_POST['article'];


 $connect = new PDO("mysql:dbname=commentaires", 'root', '0000');
 $query = "INSERT INTO article (title, articles)
 VALUES ('$title', '$commentaire')";

//  echo $query;

$statement = $connect->prepare($query);
$statement->execute();

?>

