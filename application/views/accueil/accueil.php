<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>Accueil</title> 
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/accueil.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
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
				 <form>
				  <div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon">Text</span>
				    <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
				  </div>
				</form>
			</div>
		</div>
	</section>
	<section>
		<div id="container-annonce" class="row">
			<div class="col-md-offset-1 col-md-10 col-md-offset-1">Zone affichage</div>
			<?php
				var_dump($annonces);
			?>
		</div>
	</section>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-3.3.1.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>