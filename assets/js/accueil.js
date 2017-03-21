$(function(){
	$(".testHover").mouseover(function(){
		$(this).find(".test").css("visibility","visible");
	});
	$(".testHover").mouseout(function(){
		$(this).find(".test").css("visibility","hidden");
	});
	//$( "#dateDisponibilite" ).datepicker({minDate: 0});
	//$.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );		
	$(".testHover").mouseover(function(){
		$(this).find(".annoncesMonCompte").css("visibility","visible");
	});
	$(".testHover").mouseout(function(){
		$(this).find(".annoncesMonCompte").css("visibility","hidden");
	});


	//autocomplete
	$("#localisation").autocomplete({
		source: "accueil/autocomplete",
		minLength: 3,
		delay: 300
	});	
});