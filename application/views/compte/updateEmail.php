<div class="modal-header">
    <center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> <br>
      Modification de mon Email
    </h1></center>
</div>
<div class="modal-body">
    <form role="form" id="formUpdateEmail">  
      <div class="form-group">
        <label for="nouvelEmail">Nouvel Email</label>
          <input type="email" class="form-control"
              id="nouvelEmail" name="nouvelEmail" placeholder="Entrez votre nouvel email" required/>
      </div>
      <div class="form-group">
        <label for="confirmNouvelEmail">Confirmez Nouvel Email</label>
          <input type="email" class="form-control"
              id="confirmNouvelEmail" name="confirmNouvelEmail" placeholder="Confirmez votre nouvel email" required/>
      </div>
      <div class="form-group">
        <label for="motDePasse">Mot de passe</label>
          <input type="password" class="form-control"
              id="motDePasse" name="motDePasse" placeholder="Entrez votre mot de passe" required/>
      </div>
      <input type="hidden" name="emailActuel"  id="emailActuel" value="<?php echo $emailActuel; ?>">
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
    $("#formUpdateEmail").on("submit", function(event){
      event.preventDefault();
      var nouvelEmail = $("#nouvelEmail").val();
      var confirmNouvelEmail = $("#confirmNouvelEmail").val();      
      var emailActuel = $("#emailActuel").val();
      var motDePasse = $('#motDePasse').val();

      $.ajax({
        type: "POST",
        url: "Compte/update_email",
        dataType: 'json',
        data: {
          'nouvelEmail': nouvelEmail,
          'confirmNouvelEmail': confirmNouvelEmail,
          'emailActuel': emailActuel,
          'motDePasse' : motDePasse
        },
        success: function(data){
          console.log(data);
          if(data.errorEmail){
            $("label[for='nouvelEmail']").html("Email <span class='red'><em>" + data.errorEmail + "</em></span>");
          }
          else{
            $("label[for='nouvelEmail']").html("Email");
          }
          if(data.errorPassword){
            $("label[for='motDePasse']").html("Mot de passe <span class='red'><em>" + data.errorPassword + "</em></span>");
          }
          else{
            $("label[for='motDePasse']").html("Mot de passe");
          }
          if(data.closeModal){
            $("#modalEditEmail").modal('hide');
            $('#email').val(data.nouvelEmail);
          }
        }
      });
    });
  });

</script>