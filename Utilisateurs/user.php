<?php

include "models/user_obj.php";

function getAllComment(){

$connect = new PDO("mysql:dbname=commentaires", 'root', '0000');

$query = "SELECT * FROM user ORDER BY id";

$statement = $connect->prepare($query);
$statement->setFetchMode(PDO::FETCH_CLASS, 'User');
$statement->execute();


$result = $statement->fetchAll();
return $result;
}
$result=getAllComment();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="#">BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"> <a class="nav-link" href="../Accueil/article.html"> Accueil <span class="sr-only"> (current)
                            </span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="../Articles/index.php"> Articles </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="user.php"> Utilisateurs </a> </li>
                </ul>
            </div>
        </nav>
</header>
<body style="margin: 0; padding: 0;">

<div id= "section_site" style ="margin: 40px;">

    <h2 align="center"><a href="#">Utilisateur</a></h2>

    <div class="form-group">
        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="name" />
    </div>

    <div class="form-group">
        <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="lastname" />
    </div>
    <div class="form-group">
        <input type="text" name="mail" id="mail" class="form-control" placeholder="mail" />
    </div>

    <input type="hidden" id="id_user" name="id_user"/>

<div class="form-group" style ="margin-bottom: 25px;">
     <input type="submit" name="add" id="add" class="" value="Ajouter" onclick="add_user()"/>
     <input type="submit" name="dlt" id="btn_modif" class="" value="Modifier" onclick="upd_user()"/>
     <!-- <input type="hidden" id="id_user" name="id_user"/> -->
</div>
     <div id="display_user">

     <?php foreach($result as $user) {?> 
    <div id="<?=$user->id ?>">
        <span><?php echo $user->name ?></span>
        <span><?php echo $user->first_name?></span>
        <span><?php echo $user->mail ?></span>
    <input type="submit" name="voir" id="voir" class="" value="voir" onclick="show_user(<?=$user->id?>)"/>
    <input type="submit" name="modif" id="modif" class="" value="modif" onclick="upd_user(<?php echo $user->id ?>)"/>
    <input type="submit" name="dlt" id="dlt" class="" value="delete" onclick="dlt_user(<?=$user->id?>)"/>
</div>
<?php }
?>
</div>
    </div>
    </div>
</body>
</html>