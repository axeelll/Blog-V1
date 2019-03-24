function send_article() {

    var req = new XMLHttpRequest();
  
    req.onreadystatechange = function () {
  
    if (req.readyState == 4 && req.status == 200) {
  
    var article = document.getElementById("article_content").value;
    var titre = document.getElementById("title_name").value;
    
    var contenu = article + titre;
    var reponse = req.response;
    var enfant = document.createElement('span');
    enfant.setAttribute("id", reponse);
    var parent = document.getElementById("display_article");



    parent.appendChild(enfant);

    document.getElementById("display_article").lastChild.innerHTML = contenu + "<input type='submit' name='voir' id='voir' class='' value='voir' onclick='show_article(" + reponse.id + ")'/>" +
    "<input type='submit' name='modif' id='modif' class='' value='modif' onclick='dlt_article(" + reponse.id + ")'/>" +
    "<input type='submit' name='dlt' id='dlt' class='' value='delete' onclick='dlt_user(" + reponse.id + ")'/>";
  

    

  }
};
  
  
  req.open('POST', './controllers/add_article.php');
  
  var data = new FormData();
  data.append('article', document.getElementById('article_content').value);
  data.append('title', document.getElementById('title_name').value);
  req.send(data);
  
}

  
  
  
  
  function dlt_article(id) {
  
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
  
        document.getElementById(id).innerHTML = "";
  
      }
    }
  
  
    xhr.open('POST', 'controllers/dlt_article.php');
  
    var data = new FormData();
    data.append('id', id);
  
    xhr.send(data);
  
  }
  
  
  
  
  
  
  
  function show_article(id) {
  
    // AJAX : 1ere étape : création de l'objet XMLHttpRequest
    var xhr = new XMLHttpRequest();
  
    // AJAX : 2éme étape : création de la fonction de rappel
    // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
    xhr.onreadystatechange = function () {
  
      // on traite le cas ou la requête à finie d'être initialisée 
      // et que la réponse du serveur est valide
      if (xhr.readyState == 4 && xhr.status == 200) {
  
        var reponse = JSON.parse(xhr.responseText);
  
        document.getElementById("article_content").value = reponse.articles;
        document.getElementById("title_name").value = reponse.title;
  
        document.getElementById("id_article").value = reponse.id;
        // document.getElementById("add").className = "visible"; 
        // document.getElementById("btn_modif").className = "hidden";   
  
      }
    };
  
    // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
    xhr.open('POST', 'controllers/show_article.php');
  
    var data = new FormData();
    data.append('id', id);
  
    // AJAX : 4ème étape : envoi de la requête avec les paramettres
    xhr.send(data);
  }
  
  
  
  
  function upd_article(id) {
  
  
  
    var req = new XMLHttpRequest();
  
    req.onreadystatechange = function () {
  
      if (req.readyState == 4 && req.status == 200) {
  
        var article = document.getElementById('display_article');
        var article_div = document.getElementById(document.getElementById('id_article').value);

        article.removeChild(article_div);

        var enfant = document.createElement('div');
        var reponse = JSON.parse(req.responseText);
        // var parent = document.getElementById('display_article');


         var title = reponse.title;
         var comment = reponse.articles;
         var contenu = title + comment ;
        //  article_div.innerHTML = contenu;
  
  
        // parent.appendChild(enfant);
  
        var enfant = contenu + "<input type='submit' name='voir' id='voir' class='' value='voir' onclick='show_user(" + reponse + ")'/>" +
          "<input type='submit' name='modif' id='modif' class='' value='modif' onclick='dlt_article(" + reponse.id + ")'/>" +
          "<input type='submit' name='dlt' id='dlt' class='' value='delete' onclick='dlt_user(" + reponse.id + ")'/>";
        // var noeud_user = document.createElement("div");
        // var user = JSON.parse(req.responseText);
  
        // enfant.innerHTML = "<span>"+reponse.title+"</span><br>";
        // enfant.innerHTML += "<span>"+reponse.articles+"</span>";
        // enfant.innerHtml += "<input type='submit' name='voir' id='voir' class='input' value='voir' onclick='show_article("+reponse.id+")'/>" ;
        // enfant.innerHtml += "<input type='submit' name='modif' id='modif' class='' value='modif' onclick='dlt_article("+reponse.id+")'/>" ;
        
  
        enfant.setAttribute("id", reponse.id);
  
        article.insertBefore(enfant, article.firstChild);
  
        // cleanform();
  
  
  
      }
    };
  
    req.open('POST', 'controllers/upd_article.php');
  
    var data = new FormData();
    data.append('title_name', document.getElementById('title_name').value);
    data.append('article_content', document.getElementById('article_content').value);
    data.append('id', document.getElementById("id_article").value);
  
    req.send(data);
  
  }
  
