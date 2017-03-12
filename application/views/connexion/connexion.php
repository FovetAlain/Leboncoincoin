<div class="modal-header">
    <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> Louer un logement, apprécier et recommander <br>
La location qui n'a rien à cacher.</h1></center>
</div>
<!-- Modal Body -->
<div class="modal-body">
    <form role="form" id="formConnexion">
      <div class="form-group">
        <label for="email">Adresse Email</label>
          <input type="text" class="form-control"
          id="email" name="email" placeholder="Entrez votre email" required/>
      </div>
      <div class="form-group">
        <label for="password">Prénom</label>
          <input type="password" class="form-control"
              id="password" name="password" placeholder="Entrez votre mot de passe" required/>
      </div>

    
    <button type="button" class="btn btn-default"
            data-dismiss="modal">
                Annuler
    </button>
    <button type="submit" class="btn btn-success">
        Se connecter
    </button>
    </form>
</div>
<script>
	$(function(){
		$("#formConnexion").on("submit", function(event){
      event.preventDefault();
      var email = $("#email").val();
      var password = $("#password").val();

      $.ajax({
        type: "POST",
        url: "connexion/index",
        data: {
          'email': email,
          'password': password
        },
        success: function(data){
          if(data === 'false'){
            $("#modalConnexion").modal('hide');
          }
        }
      });


		});
	});

</script>