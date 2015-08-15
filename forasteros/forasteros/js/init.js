(function($){
  $(function(){
    //Inicia dropdown
    $(".dropdown-button").dropdown();
    //
    $('.button-collapse').sideNav();
    //Iniciar parallax
    $('.parallax').parallax();
    //Aqui se inicializa el selector de fecha
    $('.datepicker').pickadate({
      selectMonths: true, // Este mantiene un control de los meses
      selectYears: 1 // Este es el limite de los años que apareceran en el datepicker
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space