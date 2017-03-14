<div class="modal-header">
    <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> <br>
      Rejoignez nous pour commencer à louer en confiance
    </h1></center>
</div>
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
      <div class="form-group">
        <label for="email">Email</label>
          <input type="email" class="form-control"
              id="email" name="email" placeholder="Entrez votre email" required/>
      </div>
      <div class="form-group">
        <label for="confirmEmail">Confirmez Email</label>
          <input type="email" class="form-control"
              id="confirmEmail" name="confirmEmail" placeholder="Confirmez votre email" required/>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe <em>(minimum 6 caractères dont 1 chiffre et un caractère spécial)</em></label>
          <input type="password" class="form-control"
              id="password" name="password" placeholder="Entrez votre mot de passe" required/>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirmez mot de passe</label>
          <input type="password" class="form-control"
              id="confirmPassword" name="confirmPassword" placeholder="Confirmez votre mot de passe" required/>
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
      var email = $("#email").val();
      var confirmEmail = $("#confirmEmail").val();
      var password = $("#password").val();
      var confirmPassword = $("#confirmPassword").val();
      $.ajax({
        type: "POST",
        url: "inscription/index",
        dataType: 'json',
        data: {
          'nomLocataire': nomLocataire,
          'prenomLocataire': prenomLocataire,
          'email': email,
          'confirmEmail': confirmEmail,
          'password': password,
          'confirmPassword': confirmPassword
        },
        success: function(data){
          if(data.errorNomLocataire){
            $("label[for='nomLocataire']").html("Nom <span class='red'><em>" + data.errorNomLocataire + "</em></span>");
          }
          if(data.errorPrenomLocataire){
            $("label[for='prenomLocataire']").html("Prénom <span class='red'><em>" + data.errorPrenomLocataire + "</em></span>");
          }
          if(data.errorEmail){
            $("label[for='email']").html("Email <span class='red'><em>" + data.errorEmail + "</em></span>");
          }
          if(data.errorPassword){
            $("label[for='password']").html("Mot de passe <em>(minimum 6 caractères dont 1 chiffre et un caractère spécial)</em> <span class='red'><em>" + data.errorPassword + "</em></span>");
          }
          if(data.closeModal){
            $("#modalInscription").modal('hide');
          }
        }
      });


		});
	});

</script>