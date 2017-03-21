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
		<?php $this->view('layout/header'); ?>
	</header>
	<center><h2> Mon Compte </h2></center>
	
		<div class="row">
			<div class="well col-md-offset-1 col-md-4" style="margin-right: 10px;">
			<center><h3>Mes Coordonnées</h3></center>
				<form role="form" id="formMonCompte">
					<div class="col-md-12 form-group">
					<label for="nom">Nom</label>
					  <input type="text" class="form-control"
					      id="nom" name="nom" disabled required/>
					</div>
					<div class="col-md-12 form-group">
					<label for="prenom">Prénom</label>
					  <input type="text" class="form-control"
					      id="prenom" name="prenom" disabled required/>
					</div>
					<div class="col-md-12 form-group">
					<label for="motDePasse">Mot De Passe Actuel <a>(modifier mon mot de passe)</a></label>
					  <input type="text" class="form-control"
					      id="motDePasse" name="motDePasse" placeholder="" required/>
					</div>
			    </form>
			</div>
			<div class=" well col-md-6">
			<center><h3>Mes Annonces</h3></center>
				<div id="container-annonce" class="col-md-12">
					<div >
					<?php 
					if(isset($annonces))
					{
					$compteur = 1;
						foreach($annonces as $annonce){
								echo '<div class="col-md-4 testHover"><span class="annoncesMonCompte">'.$annonce->ville.' <br> '.$annonce->lienImage.'</span><img class="imageAnnoncesMonCompte" src='. base_url(). 'assets/images/'. $annonce->lienImage.'> <div class="belowImg"> <span class="belowImgPrice"> 650 €</span> <span> '.$annonce->ville.'  -  Libre immédiatement </span> <br> <span class="stars">★★★★★</span> 5 commentaires </div> </div>' ;
								if($compteur == 2)
									break;
								$compteur +=1;
						}
					}else{
					echo "<h3>Aucune annonce enregistrée</h3>";
					}
					?>
					</div>
				</div>
			</div>
		</div>
	<footer>
		<?php $this->view('layout/footer'); ?>
	</footer>
	<script src="<?php echo base_url("assets/js/jquery-3.1.1.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/jquery-ui.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/datepicker-fr.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/accueil.js"); ?>"></script>
	<script>
		$( function() {
			$( "#checkboxMaison" ).checkboxradio();
			$( "#checkboxAppartement" ).checkboxradio();
		});
	</script>
</body>
</html>