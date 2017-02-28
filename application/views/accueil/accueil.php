<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>Accueil</title> 
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/accueil.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
        <link rel = "stylesheet" href="<?php echo base_url("assets/css/jquery-ui.css"); ?>" />
</head>
<body>
	<header>
		<?php $this->view('layout/header'); ?>
	</header>
	<section>
		<div class="row">
			<h1 id="accroche" class="col-md-offset-3 col-md-6 col-md-offset-3">Phrase d'accroche</h1>	
		</div>
			<div class="container">
				<div class="jumbotron">					
					<form class="form-inline">
						<div class="row">
						  	<div class="col-md-6">						  
							  	<div class="input-group">
								    <span class="input-group-addon">Où ?</span>
							    	<input id="localisation" type="text" class="form-control" name="localisation" placeholder="Localité">
							  </div>						
						  	</div>
						  	<div class="col-md-3">						  
							 	<div class="input-group">
							    	<span class="input-group-addon">Quand ?</span>
							    	<input id="dateRecherche" type="text" class="form-control" name="dateRecherche" placeholder="Date">
							  	</div>						
						  	</div>
						  	<div class="col-md-2">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Loyer</span>
							    	<input id="prix" type="text" class="form-control" name="prix" placeholder="€">
							  	</div>					
						  	</div>
						  	<div class="col-md-1">						  	
						  		<button type="button" class="btn btn-default">Go</button>				  
						  	</div>
						</div>
					</form>					
				</div>
			</div>
	</section>
	<section>
		<div id="container-annonce" class="row">
			<div class="container">
			<?php 
				foreach($annonces as $annonce){
   					echo '<div class="col-md-4 col-sm-6 testHover"><span class="test">'.$annonce->AdresseVille.' <br> '.$annonce->lienImage.'</span><img class="imageAccueil" src='. base_url(). 'assets/images/'. $annonce->lienImage.'> <p>'.$annonce->AdresseVille.'</p></div>' ;
				}
			?>
			</div>
		</div>
	</section>
	<footer>
		<?php $this->view('layout/footer'); ?>
	</footer>
	<script src="<?php echo base_url("assets/js/jquery-3.1.1.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/jquery-ui.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/datepicker-fr.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/accueil.js"); ?>"></script>
</body>
</html>