<div class="container">
	<?php 
		foreach($annonces as $annonce){
				echo '<div class="col-md-3 col-sm-6 testHover"><span class="test">'.$annonce->ville.' <br> '.$annonce->lienImage.'</span><img class="imageAccueil" src='. base_url(). 'assets/images/'. $annonce->lienImage.'> <div class="belowImg"> <span class="belowImgPrice"> 650 €</span> <span> '.$annonce->ville.'  -  Libre immédiatement </span> <br> <span class="stars">★★★★★</span> 5 commentaires </div> </div>' ;
		}
	?>
</div>