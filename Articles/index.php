<?php
function getAllComment(){

include "art_obj.php";

$connect = new PDO("mysql:dbname=commentaires", 'root', '0000');

$query = "SELECT * FROM article ORDER BY id";

$statement = $connect->prepare($query);
$statement->setFetchMode(PDO::FETCH_CLASS, 'Article');

$statement->execute();

$result = $statement->fetchAll();
return $result;
}
$result=getAllComment();
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Comment System using PHP and Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
 </head>
 <body>
 <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="#">BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"> <a class="nav-link" href="../Accueil/article.html"> Accueil <span class="sr-only"> (current)
                            </span></a> </li>
                    <li class="nav-item"> <a class="nav-link" href="index.php"> Articles</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="../Utilisateurs/user.php"> Utilisateurs </a> </li>
                </ul>
            </div>
        </nav>
</header>

 <div id= "section_site" style ="margin: 40px;">
      <h2 align="center"><a href="#">Article</a></h2>
      <br />

    <div class="form-group">
        <input type="text" name="title_name" id="title_name" class="form-control" placeholder="Titre" />
    </div>

    <div class="form-group">
        <textarea name="article_content" id="article_content" class="form-control" placeholder="Article" rows="5"></textarea>
    </div>

    <input type="hidden" id="id_article" name="id_article"/>

    <div class="form-group" style ="margin-bottom: 25px;">
          <input type="hidden" name="article_id" id="article_id" value="0" />
          <input type="submit" name="add" id="add" class="" value="Ajouter" onclick="send_article()"/>
          <input type="submit" name="dlt" id="dlt" class="" value="Supprimer" onclick="dlt_article()"/>
          <input type="submit" name="dlt" id="btn_modif" class="" value="Enregistrer" onclick="upd_article()"/>
    </div>
     <div id="display_article" >

     <?php foreach($result as $reponse) {?> 
     <div id="<?=$reponse->id ?>">
          <span> <?php echo $reponse->title ?></span>
          <span> <?php echo $reponse->articles ?></span>
          <input type="submit" name="voir" id="voir" class="input" value="voir" onclick="show_article(<?=$reponse->id?>)"/>
          <input type="submit" name="dlt" id="dlt" class="input" value="delete" onclick="dlt_article(<?=$reponse->id?>)"/>
    </div><?php
    }
    ?>
    </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="main.js"></script>
</body>
</html>
