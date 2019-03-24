<?php

$id = $_POST['id'];

$connec = new PDO("mysql:dbname=commentaires", 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['id'])){

    $id = $_POST['id'];
    
                $request = $connec->prepare("DELETE FROM article WHERE  id='$id' ");
                $request -> execute();
                $request -> closeCursor();
}


?>