<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>Annonce</title> 
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/accueil.css'); ?>"/>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
        <link rel = "stylesheet" href="<?php echo base_url("assets/css/jquery-ui.css"); ?>" />
</head>
<body>
	<header>
		<nav class="navbar navbar-default" id="navbarHeader">
			<?php $this->view('layout/header'); ?>
		</nav>
	</header>
	<div id="container-annonce" class="row">
		<div class="container">
		<?php 
			//var_dump($annonce);
			//var_dump($photos);
			echo '<div class="col-md-3 col-sm-6"><img class="imageAccueil" src='. base_url(). 'assets/images/'. $photos[0]->lienPhoto.'> <div class="belowImg"> <span class="belowImgPrice"> 650 €</span> <span> '.$annonce[0]->ville.'  -  Libre immédiatement </span> <br> <span class="stars">★★★★★</span> 5 commentaires </div> </div>' ;
			
		?>
		</div>
	</div>
	<footer>
		<?php $this->view('layout/footer'); ?>
	</footer>
</body>
</html>