function send_article() {

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {

  };

  req.open('POST', 'controllers/add_article.php');

  var data = new FormData();
  data.append('article', document.getElementById('article_content').value);
  data.append('title', document.getElementById('title_name').value);
  req.send(data);


  var get = document.getElementById("article_content").value;
  var create = document.createElement("div");
  create.innerHTML = "Article " + get;

  var gete = document.getElementById("title_name").value;
  var createe = document.createElement("div");
  createe.innerHTML = "TITRE " + gete;

  var parent = document.getElementById("display_article");
  parent.appendChild(createe);

  var parent = document.getElementById("display_article");
  parent.appendChild(create);  

  

}

cleanform();



function add_user() {

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {

    if (req.readyState == 4 && req.status == 200) {

      var nom = document.getElementById('user_name').value;
      var prenom = document.getElementById('user_lastname').value;
      var email = document.getElementById('mail').value;

      var contenu = nom + prenom + email;
      var user = req.response;
      var enfant = document.createElement('span');
      enfant.setAttribute("id", user);
      var parent = document.getElementById('display_user');





      parent.appendChild(enfant);

      document.getElementById("display_user").lastChild.innerHTML = contenu + "<input type='submit' name='voir' id='voir' class='' value='voir' onclick='show_user(" + user + ")'/>" +
        "<input type='submit' name='modif' id='modif' class='' value='modif' onclick='dlt_article(" + user + ")'/>" +
        "<input type='submit' name='dlt' id='dlt' class='' value='delete' onclick='dlt_user(" + user + ")'/>";

    }
  };

  req.open('POST', 'controllers/add_user.php');

  var data = new FormData();
  data.append('user_name', document.getElementById('user_name').value);
  data.append('user_lastname', document.getElementById('user_lastname').value);
  data.append('mail', document.getElementById('mail').value);

  req.send(data);

}







function dlt_user(id) {

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {

      document.getElementById(id).innerHTML = "";

    }
  }


  xhr.open('POST', 'controllers/dlt_user.php');

  var data = new FormData();
  data.append('id', id);

  xhr.send(data);

}







function show_user(id) {

  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange = function () {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la réponse du serveur est valide
    if (xhr.readyState == 4 && xhr.status == 200) {

      var user = JSON.parse(xhr.responseText);

      document.getElementById("user_name").value = user.name;
      document.getElementById("user_lastname").value = user.first_name;
      document.getElementById("mail").value = user.mail;

      document.getElementById("id_user").value = user.id;
      // document.getElementById("add").className = "visible"; 
      // document.getElementById("btn_modif").className = "hidden";   

    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST', 'controllers/user_show.php');

  var data = new FormData();
  data.append('id', id);

  // AJAX : 4ème étape : envoi de la requête avec les paramettres
  xhr.send(data);
}




function upd_user(id) {



  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {

    if (xhr.readyState == 4 && xhr.status == 200) {

      var users = document.getElementById('display_user');
      var user_div = document.getElementById(id);

      users.removeChild(user_div);


      var noeud_user = document.createElement("div");
      var user = JSON.parse(xhr.responseText);
      var nom = document.getElementById('user_name').value;
      var prenom = document.getElementById('user_lastname').value;
      var email = document.getElementById('mail').value;

      var contenu = nom + prenom + email;
      var enfant = document.createElement('p');
      enfant.setAttribute("id", user);
      var parent = document.getElementById('display_user');





      parent.appendChild(enfant);

      document.getElementById("display_user").lastChild.innerHTML = contenu + "<input type='submit' name='voir' id='voir' class='' value='voir' onclick='show_user(" + user + ")'/>" +
        "<input type='submit' name='modif' id='modif' class='' value='modif' onclick='dlt_article(" + user + ")'/>" +
        "<input type='submit' name='dlt' id='dlt' class='' value='delete' onclick='dlt_user(" + user + ")'/>";
      

      // noeud_user.innerHTML = "<span>"+user.name+"</span><br>";
      // noeud_user.innerHTML = "<span>"+user.first_name+"</span>";
      // noeud_user.innerHTML = "<span>"+user.mail+"</span>";
      // noeud_user.innerHtml += "<input type='submit' name='voir' id='voir' class='' value='voir' onclick='show_user("+user.id+")'/>" ;
      // noeud_user.innerHtml += "<input type='submit' name='modif' id='modif' class='' value='modif' onclick='dlt_article("+user.id+")'/>" ;
      // noeud_user.innerHtml += "<input type='submit' name='dlt' id='dlt' class='' value='delete' onclick='dlt_user("+user.id+")'/>" ;

      // noeud_user.setAttribute("id", user.id);

      // users.insertBefore(noeud_user, users.firstChild);

      // cleanform();



    }
  };

  xhr.open('POST', 'controllers/upd_user.php');

  var data = new FormData();
  data.append('user_name', document.getElementById('user_name').value);
  data.append('user_lastname', document.getElementById('user_lastname').value);
  data.append('mail', document.getElementById('mail').value);
  data.append('id', document.getElementById("id_user").value);

 xhr.send(data);

}

