<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Accueil</title> 
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel = "stylesheet" href="<?php echo base_url("assets/css/jquery-ui.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/accueil.css'); ?>"/>
</head>
<body>
  <header>
    <nav class="navbar navbar-default" id="navbarHeader">
      <?php $this->view('layout/header'); ?>
    </nav>
  </header>
  <section>
    <div>
      <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> <br>
        Rejoignez nous pour commencer à louer en confiance
      </h1></center>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <form role="form" id="form_depot">  
            <div class="form-group">
              <label for="titre">Titre Annonce</label>
                <input type="text" class="form-control"
                  id="titre" name="titre" placeholder="Entrez un titre à votre annonce" required/>
            </div>
            <div class="form-group">
              <label for="texte">Texte Annonce</label>
                <textarea class="form-control" id="texte"
                  name="texte" placeholder="Entrez votre description" required></textarea>
            </div>
            <div class="form-group">
              <label for="prix">Prix</label>
                <input type="text" class="form-control" id="prix"
                    name="prix" placeholder="Entrez votre prix" required/>
            </div>
            <div class="form-group">
              <label for="ville">Code Postal + Ville</label>
                <input type="text" class="form-control localisation" id="ville"
                  name="ville" placeholder="Entrez le code postal et la ville de votre logement" required/>
            </div>
            <div class="form-group">
              <label for="surface">Surface</label>
                <input type="text" class="form-control" id="surface"
                  name="surface" placeholder="Entrez la surface du logement"/>
            </div>
            <button type="button" class="btn btn-default"
                    data-dismiss="modal">
                        Annuler
            </button>
            <button type="submit" class="btn btn-success">
                Valider
            </button>
          </form>
        </div> 
        <div class="col-md-8">
          <?php echo form_open_multipart('annonces/do_upload', 'id="form1"');?>
            <label for="photo">Photo</label>
            <input type="hidden" name="idAnnonce" id="idAnnonce" />
            <input type='file' name="imgInp" size="20" id="imgInp" />
            <br>
            <img id="imgUpload" src="#" width="500px" />
          </form>
        </div> 
      </div>
    </div>
  </section>
  <script src="<?php echo base_url("assets/js/jquery-3.1.1.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/jquery-ui.js"); ?>"></script>
  <script>
    $( function() {
      $('#imgUpload').hide();
      $('#btnAccueil').removeClass('active');
      $('#btnDepot').addClass('active');

      $("#form_depot").on("submit", function(event){
        event.preventDefault();
        if($("#imgInp").val() != "")
        {        
          var titre = $("#titre").val();
          var texte = $("#texte").val();
          var prix = $("#prix").val();
          var ville = $("#ville").val();
          var surface = $("#surface").val();
          $.ajax({
            type: "POST",
            url: "annonces/create_annonce",
            dataType: 'json',
            data: {
                'titre': titre,
                'prix': prix,
                'texte': texte,
                'ville': ville,
                'surface' : surface
            },
            success: function(data){
              if(data.errorTitre){
                $("label[for='titre']").html("Titre Annonce <span class='red'><em>" + data.errorTitre + "</em></span>");
              }else{
                $("label[for='titre']").html("Titre Annonce");
              }
              if(data.errorTexte){
                $("label[for='texte']").html("Texte Annonce <span class='red'><em>" + data.errorTexte + "</em></span>");
              }else{
                $("label[for='texte']").html("Texte Annonce");
              }
              if(data.errorPrix){
                $("label[for='prix']").html("Prix <span class='red'><em>" + data.errorPrix + "</em></span>");
              }else{
                $("label[for='prix']").html("Prix");
              }
              if(data.errorVille){
                $("label[for='ville']").html("Code Postal + Ville <span class='red'><em>" + data.errorVille + "</em></span>");
              }else{
                $("label[for='ville']").html("Code Postal + Ville");
              }
              if(data.errorSurface){
                $("label[for='surface']").html("Surface <span class='red'><em>" + data.errorSurface + "</em></span>");
              }else{
                $("label[for='surface']").html("Surface");
              } 
              if(data.success){
                $("#idAnnonce").val(data.success);
                $("#form1").submit(); 
              }                 
            }             
          });
        }
        else{
          $("label[for='photo']").html("Photo <span class='red'><em>" + "Merci de choisir une photo" + "</em></span>");
        }
      });
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();          
          reader.onload = function (e) {
              $('#imgUpload').attr('src', e.target.result);
          }            
          reader.readAsDataURL(input.files[0]);
        }
      }    
      $("#imgInp").change(function(){
        readURL(this);
        $('#imgUpload').show();
      });

      //autocomplete
      $(".localisation").autocomplete({
        source: "accueil/autocomplete",
        minLength: 3,
        delay: 300
      }); 
    });
  </script>
</body>
</html>
