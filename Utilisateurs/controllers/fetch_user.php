<?php


include_once('/connec.php');

$dbh = getDBH(DSN, USER, PASSWORD);
$statement = $dbh->prepare("SELECT * FROM user ORDER BY id");
$statement = $connect->prepare($query);
$statement->fetchMode(POO::FETCH_CLASS, 'User');
$statement->execute();

$users = $req->fetchAll();

foreach($users as $user)
{
    $users = $user->getString();
}

require_once('views/layout.php');
 

?> 