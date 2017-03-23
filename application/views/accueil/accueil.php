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
			<div class="container container_filtre">
				<div class="well col-md-offset-2 col-md-8">				
					<form class="form-inline" id="form_annonce">
						<div class="row">
						  	<div class="col-md-7">						  
							  	<div class="input-group">
								    <span class="input-group-addon">Où ?</span>
							    	<input class="form-control localisation" id="localisation" type="text" name="localisation" placeholder="Localité">
							  </div>						
						  	</div>
						  	<div class="col-md-3">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Loyer Max</span>
							    	<input type="text" class="form-control" name="prix" id="prix" placeholder="€">
							  	</div>					
						  	</div>
						  	
						  	<div class="col-md-2">						  	
						  		<input type="submit" value="Go" class="btn btn-default">				  
						  	</div>
						</div>
						  	<br>
					  	<div class="row">
						  	<div class="col-md-5">	
					  		    <label for="checkboxMaison">Maison
							      	<input type="checkbox" name="checkboxMaison" id="checkboxMaison" checked="">
							    </label>
							    <label for="checkboxAppartement">Appartement
							      	<input type="checkbox" name="checkboxAppartement" id="checkboxAppartement" checked>
							    </label>		
						  	</div>
						  	<div class="col-md-3 inputHidden">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Surface Min</span>
							    	<input type="text" class="form-control" name="surfaceMin" id="surfaceMin" placeholder="M²">
							  	</div>					
						  	</div>
						  	<div class="col-md-3 inputHidden">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Pièce Min</span>
							    	<input type="text" class="form-control" name="pieceMin" id="pieceMin" placeholder="ex : 3">
							  	</div>					
						  	</div>
						</div>
						<div class="row inputHidden">	
							<div class="col-md-5">	
					  		    <label for="checkboxJardin">Jardin
							      	<input type="checkbox" name="checkboxJardin" id="checkboxJardin">
							    </label>
							    <label for="checkboxGarage">Garage
							      	<input type="checkbox" name="checkboxGarage" id="checkboxGarage">
							    </label>
							    <label for="checkboxCave">Cave
							      	<input type="checkbox" name="checkboxCave" id="checkboxCave">
							    </label>		
						  	</div>					  		
					  		<div class="col-md-3">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Surface Max</span>
							    	<input type="text" class="form-control" name="surfaceMax" id="surfaceMax" placeholder="M²">
							  	</div>					
						  	</div>
						  	<div class="col-md-3">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">Pièce Max</span>
							    	<input type="text" class="form-control" name="pieceMax" id="pieceMax" placeholder="ex : 3">
							  	</div>					
						  	</div>								 
						</div>
						<div class="row inputHidden">
							<div class="col-md-4">						  				  
							  	<div class="input-group">
							    	<span class="input-group-addon">A partir de</span>
							    	<input type="text" class="form-control" id="dateDisponibilite" name="dateDisponibilite" placeholder="XX/XX/XXXX">
							  	</div>					
						  	</div>	
						</div>									
					</form>					
				</div>
			
			</div>
	</section>
	<section>
		<div id="container-annonce" class="row">
			<?php $this->view('layout/annonce', $annonces); ?>
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
	<script>
		$( function() {
			$( "#checkboxMaison" ).checkboxradio();
			$( "#checkboxAppartement" ).checkboxradio();
			$( "#checkboxCave" ).checkboxradio();
			$( "#checkboxGarage" ).checkboxradio();
			$( "#checkboxJardin" ).checkboxradio();


			$("#form_annonce").on("submit", function(event){
				$(".inputHidden").show();
		      	event.preventDefault();
		      	var localisation = $("#localisation").val();
		      	var prix = $("#prix").val();
		      	var pieceMin = $("#pieceMin").val();
		      	var pieceMax = $("#pieceMax").val();
		      	var surfaceMin = $("#surfaceMin").val();
		      	var surfaceMax = $("#surfaceMax").val();
		      	var dateDisponibilite = $("#dateDisponibilite").val();
		      	var checkboxAppartement = $("#checkboxAppartement").is(":checked");
				var checkboxMaison = $("#checkboxMaison").is(":checked");
				var checkboxCave = $("#checkboxCave").is(":checked");
				var checkboxGarage = $("#checkboxGarage").is(":checked");
				var checkboxJardin = $("#checkboxJardin").is(":checked");
		      	$.ajax({
		        	type: "POST",
		        	url: "accueil/form_annonce",
		        	dataType: 'json',
		        	data: {
		          		'localisation': localisation,
		          		'prix': prix,
		          		'checkboxAppartement': checkboxAppartement,
		          		'checkboxMaison': checkboxMaison,
		          		'checkboxCave' : checkboxCave,
		          		'checkboxGarage' : checkboxGarage,
		          		'checkboxJardin' : checkboxJardin,
		          		'pieceMin': pieceMin,
		          		'pieceMax': pieceMax,
		          		'surfaceMin': surfaceMin,
		          		'surfaceMax': surfaceMax,
		          		'dateDisponibilite' : dateDisponibilite
		        	},
			        success: function(data){
		    	        if(data.container){
		  	            	$("#container-annonce").html(data.container);
			            }            
			        }			        
		      	});
			});
		});
	</script>
</body>
</html>