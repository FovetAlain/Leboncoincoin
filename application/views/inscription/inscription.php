<div class="modal-header">
    <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> <br>
      Rejoignez nous pour commencer à louer en confiance
    </h1></center>
</div>
<div class="modal-body">
    <form role="form" id="formInscription">  
      <div class="form-group">
        <label for="nom">Nom</label>
          <input type="text" class="form-control"
          id="nom" name="nom" placeholder="Entrez votre nom" required/>
      </div>
      <div class="form-group">
        <label for="prenom">Prénom</label>
          <input type="text" class="form-control"
              id="prenom" name="prenom" placeholder="Entrez votre prénom" required/>
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
      var nom = $("#nom").val();
      var prenom = $("#prenom").val();
      var email = $("#email").val();
      var confirmEmail = $("#confirmEmail").val();
      var password = $("#password").val();
      var confirmPassword = $("#confirmPassword").val();
      $.ajax({
        type: "POST",
        url: "inscription/index",
        dataType: 'json',
        data: {
          'nom': nom,
          'prenom': prenom,
          'email': email,
          'confirmEmail': confirmEmail,
          'password': password,
          'confirmPassword': confirmPassword
        },
        success: function(data){
          if(data.errorNom){
            $("label[for='nom']").html("Nom <span class='red'><em>" + data.errorNom + "</em></span>");
          }
          else{
            $("label[for='nom']").html("Nom");
          }
          if(data.errorPrenom){
            $("label[for='prenom']").html("Prénom <span class='red'><em>" + data.errorPrenom + "</em></span>");
          }
          else{
            $("label[for='prenom']").html("Prénom");
          }
          if(data.errorEmail){
            $("label[for='email']").html("Email <span class='red'><em>" + data.errorEmail + "</em></span>");
          }
          else{
            $("label[for='email']").html("Email");
          }
          if(data.errorPassword){
            $("label[for='password']").html("Mot de passe <em>(minimum 6 caractères dont 1 chiffre et un caractère spécial)</em> <span class='red'><em>" + data.errorPassword + "</em></span>");
          }else{
            $("label[for='password']").html("Mot de passe <em>(minimum 6 caractères dont 1 chiffre et un caractère spécial)</em>");
          }
          if(data.closeModal){
            $("#modalInscription").modal('hide');
            if(data.nav){
              $("#navbarHeader").html(data.nav);
            }
          }
        }
      });


		});
	});

</script>