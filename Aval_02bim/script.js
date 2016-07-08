$(document).ready(function(e){
		$("#navbar a ").click(function(e){
		e.preventDefault();
		var href=$(this).attr('href');
		$(".conteudo").load(href+" .conteudo");
	});
});
	
function chama(botao) {
	var href = $(botao).attr('href');
	$(".conteudo").load(href + " .conteudo");
	
}
$(function(){
    $("body").on("click", ".cC", function(){
    if (!$(this).hasClass("hasDatepicker"))
    {
	$(this).datepicker({
		minDate: new Date(2000, 1 - 1, 1), 
		maxDate: 0,  	
		showOn: "button",
		buttonImage: "calendario.png",
		buttonImageOnly: true		
	});				
   }
  	});
});
$(function(){
    $("body").on("click", ".cF", function(){
    if (!$(this).hasClass("hasDatepicker"))
    {
	$(this).datepicker({
		minDate: new Date(1950, 1 - 1, 1), 
		maxDate: 0,  	
		showOn: "button",
		buttonImage: "calendario.png",
		buttonImageOnly: true		
	});				
   }
  	});
});
function verifica() {
	var nome = document.querySelector("#nome").value;
	var email = document.querySelector("#email").value;
	
	if((nome=="")||(email=="")){
		alert("Existem campos vazios");
		return false;
	}
}
( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional[ "pt-BR" ] = {
	closeText: "Fechar",
	prevText: "&#x3C;Anterior",
	nextText: "Próximo&#x3E;",
	currentText: "Hoje",
	monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
	"Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
	monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
	"Jul","Ago","Set","Out","Nov","Dez" ],
	dayNames: [ "Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado" ],
	dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
	dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
	weekHeader: "Sm",
	dateFormat: "dd/mm/yy",
	firstDay: 0,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: "" };
datepicker.setDefaults( datepicker.regional[ "pt-BR" ] );

return datepicker.regional[ "pt-BR" ];

} ) );
