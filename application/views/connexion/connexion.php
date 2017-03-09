<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>Formulaire d'inscription</title> 
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/accueil.css'); ?>"/>
        
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/formulaires.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
        <link rel = "stylesheet" href="<?php echo base_url("assets/css/jquery-ui.css"); ?>" />
</head>
<body>
	<header>
		<?php $this->view('layout/header'); ?>
	</header>
	<section>
		<div class="row">
			<center><h1 id="accroche" class="col-md-offset-1 col-md-10"><span class="bleu">LaBonneLoc'</span> Louer un logement, apprécier et recommander <br>
			La location qui n'a rien à cacher.</h1></center>

		</div>
			<div class="container">
				<div class="jumbotron">					
					<form class="form-inline">
						<div class="row">
						  	<div class="col-md-6">						  
							  	<div class="input-group">
								    <span class="input-group-addon">Pseudo</span>
							    	<input id="Pseudo" type="text" class="form-control" name="Pseudo" placeholder="Nom">
							  </div>						
						  	</div>
						  	
						  	<div class="col-md-6">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Mot de Passe </span>
							    	<input id="mdp" type="text" class="form-control" name="mdp" placeholder="mdp">
							  	</div>					
						  	</div>
						</div>
					</form>					
				</div>
			</div>
	</section>

	<section>
		
	</section>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
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