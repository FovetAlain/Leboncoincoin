<div class="modal-header">
    <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> Louer un logement, apprécier et recommander <br>
La location qui n'a rien à cacher.</h1></center>
</div>
<!-- Modal Body -->
<div class="modal-body">
    <form role="form" id="formConnexion">
      <div class="form-group">
        <label for="email">Adresse Email</label>
          <input type="email" class="form-control"
          id="email" name="email" placeholder="Entrez votre email" required/>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
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
        dataType: 'json',
        data: {
          'email': email,
          'password': password
        },
        success: function(data){
          if(data.errorEmail){
            $("label[for='email']").html("Adresse Email <span class='red'><em>" + data.errorEmail + "</em></span>");
          }
          else{
            $("label[for='email']").html("Adresse Email");
          }
          if(data.errorPassword){
            $("label[for='password']").html("Mot de passe" + data.errorPassword);
          }else{
            $("label[for='password']").html("Mot de passe");
          }
          if(data.closeModal){
            $("#modalConnexion").modal('hide');
            if(data.nav){
              $("#navbarHeader").html(data.nav);
            }            
          }
        }
      });


		});
	});

</script>