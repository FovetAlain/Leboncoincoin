
	<?php 
		foreach($annonces as $annonce){
			?>
				<div class="col-md-4 col-sm-6 photoAnnonce" data-toggle="collapse" data-target="#<?php echo $annonce->idAnnonce; ?>" value="<?php echo $annonce->idAnnonce; ?>">
					<img class="imageAccueil" src="<?php echo base_url('assets/images/').$annonce->lienPhoto ;?>">
						<div class="belowImg "> 
						 	<span class="belowImgPrice"> <?php echo $annonce->prix ?> €</span>
						 	<span> <?php echo $annonce->ville ?>  -  Libre immédiatement </span> 
						 	<br> 
						 	<span class="stars">★★★★★</span> 5 commentaires 
						</div> 
				</div>

				<div id="<?php echo $annonce->idAnnonce; ?>" class="collapse col-md-12 well">
					
				</div>

			<?php	
		}
	?>


