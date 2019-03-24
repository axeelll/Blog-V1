<?php

require_once("../art_obj.php");


$title = $_POST['title_name'];
$commentaire = $_POST['article_content'];
$id = (string)$_POST['id'];

$connec = new PDO("mysql:dbname=commentaires", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $request = $connec->prepare("DELETE FROM user WHERE  id='$id' ");
$request = ("UPDATE article SET  title = '$title', articles = '$commentaire'
                            WHERE id = $id");
    

$request = $connec-> prepare($request);
$request -> execute();


$request = ("SELECT * FROM article WHERE id= $id");
$prepared_request = $connec -> prepare($request);
$prepared_request-> setFetchMode(PDO::FETCH_CLASS, 'Article');
$prepared_request -> execute();

$user_ajax = $prepared_request -> fetch();

echo (json_encode($user_ajax));




?>

