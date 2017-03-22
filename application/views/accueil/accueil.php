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
		<nav class="navbar navbar-default" id="navbarHeader">
			<?php $this->view('layout/header'); ?>
		</nav>
	</header>
	<section>
		<!-- Modal -->
		<div id="modalInscription" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		    	

		    </div>

		  </div>
		</div>
		<div id="modalConnexion" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		    	

		    </div>

		  </div>
		</div>
		<div class="row">
			<center><h1 id="accroche" class="col-md-offset-1 col-md-10 col-md-offset-1"><span class="bleu">LaBonneLoc'</span> Louer un logement, apprécier et recommander <br>
			La location qui n'a rien à cacher.</h1></center>

		</div>
			<div class="container">
			<?php  if(!isset($this->session->filter_set)){ ?>
				<div class="well col-md-offset-2 col-md-8">				
					<form class="form-inline" method="post" action="<?php echo base_url('accueil/form_annonce');?>">
						<div class="row">
						  	<div class="col-md-7">						  
							  	<div class="input-group">
								    <span class="input-group-addon">Où ?</span>
							    	<input class="form-control" id="firstLocalisation" type="text" name="localisation" placeholder="Localité">
							  </div>						
						  	</div>
						  	<div class="col-md-3">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Loyer Max</span>
							    	<input type="text" class="form-control" name="prix" placeholder="€">
							  	</div>					
						  	</div>
						  	
						  	<div class="col-md-2">						  	
						  		<input type="submit" value="Go" class="btn btn-default">				  
						  	</div>
						</div>
						  	<br>
					  	<div class="row">
						  	<div class="col-md-6">	
					  		    <label for="checkboxMaison">Maison
							      	<input type="checkbox" name="checkboxMaison" id="checkboxMaison" checked="checked">
							    </label>
							    <label for="checkboxAppartement">Appartement
							      	<input type="checkbox" name="checkboxAppartement" id="checkboxAppartement" checked="checked">
							    </label>		
						  	</div>
						</div>						
					</form>					
				</div>
			<?php }else{ ?>
				<div class="well col-md-offset-2 col-md-8">				
					<form class="form-inline" method="post" action="<?php echo base_url('accueil/form_annonce');?>">
						<div class="row">
						  	<div class="col-md-7">						  
							  	<div class="input-group">
								    <span class="input-group-addon">Où ?</span>
							    	<input class="form-control" id="secondLocalisation" type="text" name="localisation" placeholder="Localité" value= "<?php echo $this->session->localisation ?>" >
							  </div>						
						  	</div>
						  	<div class="col-md-3">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Loyer Max</span>
							    	<input type="text" class="form-control" name="prix" placeholder="€" value=  <?php echo $this->session->prix; ?> >
							  	</div>					
						  	</div>
						  	
						  	<div class="col-md-2">						  	
						  		<input type="submit" value="Go" class="btn btn-default">				  
						  	</div>
						</div>
						  	<br>
					  	<div class="row">
						  	<div class="col-md-6">	
					  		    <label for="checkboxMaison">Maison
							      	<input type="checkbox" name="checkboxMaison" id="checkboxMaison" <?php echo $this->session->checkboxMaison; ?> >
							    </label>
							    <label for="checkboxAppartement">Appartement
							      	<input type="checkbox" name="checkboxAppartement" id="checkboxAppartement" <?php echo $this->session->checkboxAppartement; ?> >
							    </label>		
						  	</div>
						</div>						
					</form>					
				</div>
			<?php } ?>
			</div>
	</section>
	<section>
		<div id="container-annonce" class="row">
			<div class="container">
			<?php 
				foreach($annonces as $annonce){
   					echo '<div class="col-md-3 col-sm-6 testHover"><span class="test">'.$annonce->ville.' <br> '.$annonce->lienImage.'</span><img class="imageAccueil" src='. base_url(). 'assets/images/'. $annonce->lienImage.'> <div class="belowImg"> <span class="belowImgPrice"> 650 €</span> <span> '.$annonce->ville.'  -  Libre immédiatement </span> <br> <span class="stars">★★★★★</span> 5 commentaires </div> </div>' ;
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
	<!--<script src="<?php echo base_url("assets/js/datepicker-fr.js"); ?>"></script> -->
	<script src="<?php echo base_url("assets/js/accueil.js"); ?>"></script>
	<script>
		$( function() {
			$( "#checkboxMaison" ).checkboxradio();
			$( "#checkboxAppartement" ).checkboxradio();
		});
	</script>
</body>
</html>