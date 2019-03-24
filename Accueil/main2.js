$("#section").hide();

var num_id = 10000 ;

function load() {
    $.ajax({
    url:"load_article.php",
    type:"GET",
    success: function(articles) {
    
            articles.forEach(function(article) {  

            var d = $("#section").clone();
            var current = $("#section");
            
            $("#section").show();
            $("#section h1").html(article.title);
            $("#section p").text(article.articles);
            $(current).attr('id','section'+article.id);
            //$("#comment").text(article.articles);
        
            $(".row").append(d); 
        });
      },
    dataType:"json"
    })
  }