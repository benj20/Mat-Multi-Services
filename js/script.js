$(function(){

  $('#accueil a:contains("Accueil")').parent().addClass('active');
  $('#realisations a:contains("Réalisations")').parent().addClass('active');
  $('#partenaires a:contains("Partenaires")').parent().addClass('active');
  $('#contact a:contains("Contact")').parent().addClass('active');


  $('.maps').click(function () {
      $('.maps iframe').css("pointer-events", "auto");
  });

  var userAgent = navigator.userAgent || navigator.vendor || window.opera;
	if (userAgent.match(/Android/i)) {
		$('footer .lien-facebook').attr("href", "fb://page/804415506358177");
  }

});
