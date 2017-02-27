$(function(){
	$(".testHover").mouseover(function(){
		$(this).find(".test").css("visibility","visible");
	});
	$(".testHover").mouseout(function(){
		$(this).find(".test").css("visibility","hidden");
	});
	 $( "#dateRecherche" ).datepicker({minDate: 0});
	 $.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );		



	//autocomplete
	$("#localisation").autocomplete({
		source: "accueil/autocomplete",
		minLength: 3,
		delay: 300
	});	
});