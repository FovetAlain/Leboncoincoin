<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>Annonces</title> 
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
			foreach($annonces as $annonce){
					echo '<div class="col-md-3 col-sm-6 testHover"><span class="test">'.$annonce->prix.' <br> '.$annonce->lienImage.'</span><img class="imageAccueil" src='. base_url(). 'assets/images/'. $annonce->lienImage.'> <div class="belowImg"> <span class="belowImgPrice"> 650 €</span> <span> '.$annonce->ville.'  -  Libre immédiatement </span> <br> <span class="stars">★★★★★</span> 5 commentaires </div> </div>' ;
			}
		?>
		</div>
	</div>
	<footer>
		<?php $this->view('layout/footer'); ?>
	</footer>
</body>
</html>