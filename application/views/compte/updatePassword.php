<div class="modal-header">
    <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> <br>
      Modification de mon mot de passe
    </h1></center>
</div>
<div class="modal-body">
    <form role="form" id="formUpdateMotDePasse">  
      <div class="form-group">
        <label for="nouveauMotDePasse">Nouveau Mot de Passe</label>
          <input type="password" class="form-control"
              id="nouveauMotDePasse" name="nouveauMotDePasse" placeholder="Saisissez votre nouveau mot de passe" required/>
      </div>
      <div class="form-group">
        <label for="confirmNouveauMotDePasse">Confirmez Nouveau mot de passe</label>
          <input type="password" class="form-control"
              id="confirmNouveauMotDePasse" name="confirmNouveauMotDePasse" placeholder="Confirmez votre nouveau mot de passe" required/>
      </div>
      <div class="form-group">
        <label for="motDePasse">Mot de passe</label>
          <input type="password" class="form-control"
              id="motDePasse" name="motDePasse" placeholder="Saisissez votre mot de passe actuel" required/>
      </div>
    <button type="button" class="btn btn-default"
            data-dismiss="modal">
                Annuler
    </button>
    <button type="submit" class="btn btn-success">
        Confirmer
    </button>
    </form>
</div>

<script>
  $(function(){
    $("#formUpdateMotDePasse").on("submit", function(event){
      event.preventDefault();
      var nouveauMotDePasse = $("#nouveauMotDePasse").val();
      var confirmNouveauMotDePasse = $("#confirmNouveauMotDePasse").val();      
      var motDePasse = $('#motDePasse').val();

      $.ajax({
        type: "POST",
        url: "Compte/update_Mot_de_passe",
        dataType: 'json',
        data: {
          'nouveauMotDePasse': nouveauMotDePasse,
          'confirmNouveauMotDePasse': confirmNouveauMotDePasse,
          'motDePasse' : motDePasse
        },
        success: function(data){
          if(data.errorMotDePasse){
            $("label[for='nouveauMotDePasse']").html("Mot de passe Incorrect  <span class='red'><em>" + data.errorMotDePasse + "</em></span>");
          } else{
            $("label[for='nouveauMotDePasse']").html("Nouveau mot de passe");
          }
           if(data.errorPassword){
            $("label[for='motDePasse']").html("Mot de passe <span class='red'><em>" + data.errorPassword + "</em></span>");
          }
          else{
            $("label[for='motDePasse']").html("Mot de passe");
          }
          if(data.closeModal){
            $("#modalEditMotDePasse").modal('hide');
          }
        }
      });
    });
  });

</script>