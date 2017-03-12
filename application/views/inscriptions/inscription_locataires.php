<div class="modal-header">
    <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> Louer un logement, apprécier et recommander <br>
La location qui n'a rien à cacher.</h1></center>
</div>
<!-- Modal Body -->
<div class="modal-body">
    <form role="form" id="formInscription">
      <div class="form-group">
        <label for="nomLocataire">Nom</label>
          <input type="text" class="form-control"
          id="nomLocataire" name="nomLocataire" placeholder="Entrez votre nom" required/>
      </div>
      <div class="form-group">
        <label for="prenomLocataire">Prénom</label>
          <input type="text" class="form-control"
              id="prenomLocataire" name="prenomLocataire" placeholder="Entrez votre prénom" required/>
      </div>

    
    <button type="button" class="btn btn-default"
            data-dismiss="modal">
                Annuler
    </button>
    <button type="submit" class="btn btn-success">
        S'inscrire
    </button>
    </form>
</div>
<script>
	$(function(){
		$("#formInscription").on("submit", function(event){
      event.preventDefault();
      var nomLocataire = $("#nomLocataire").val();
      var prenomLocataire = $("#prenomLocataire").val();

      $.ajax({
        type: "POST",
        url: "inscription/index",
        data: {
          'nomLocataire': nomLocataire,
          'prenomLocataire': prenomLocataire
        },
        success: function(data){
          if(data === 'false'){
            $("#modalInscription").modal('hide');
          }
        }
      });


		});
	});

</script>