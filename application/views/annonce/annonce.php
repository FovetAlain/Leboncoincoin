

	<div id="container-annonces" class="row ">
		<?php 
			

		echo "<center><h2>".$annonces[0]->titreAnonce."</h2></center>";
		?>
		<div id="myCarousel<?php echo $annonces[0]->idAnnonce;?>" class="carousel slide col-md-offset-2 col-md-8" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
		<?php
		$compteur = 0;
			foreach($photos as $photo)
						{ if($compteur === 0)
							{
							echo '<div class="item active">';
							$compteur+=1;	
							}
							else
							{
								echo '<div class="item">';
							}
						?>
								<center><img class="imageAnnonce" src="<?php echo base_url('assets/images/'). $photo->lienPhoto; ?>"></center>
							</div>
						<?php
					}	
				?>
			 <a class="left carousel-control" href="#myCarousel<?php echo $annonces[0]->idAnnonce;?>" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			 </a>
			 <a class="right carousel-control" href="#myCarousel<?php echo $annonces[0]->idAnnonce;?>" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			 </a>				
			
		</div>
		<div class="belowImg"> 
				<span class="belowImgPrice"><?php echo $annonces[0]->prix ?> €</span>
				<span> <?php echo $annonces[0]->ville ?>   -  Libre immédiatement </span> 
				<br> 
				<span class="stars">★★★★★</span> 5 commentaires 
			</div> 
	</div>

