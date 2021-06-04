/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);


$(document).on('click', '.addRegistroCliente', function(e) {
    
    e.preventDefault(); // Para que no recargue la pag


    var formulario = document.getElementById("formRegistroCliente");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'registroCliente.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            console.log(datosTraidos);
           if(datosTraidos == 'correcto'){
            location.href="";
           }else{
            $('.toast-body').html(datosTraidos);
            $('.toast').toast('show');
        }
    }
    });
});

$(document).on('click', '.adRegistroUser', function(e) {

    e.preventDefault(); // Para que no recargue la pag

    var formulario = document.getElementById("formRegistro");
    var data = new FormData(formulario);
    
    jQuery.ajax({
        url: 'registrarUsuario.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        
        success: function(datosTraidos){
            
            if(datosTraidos==1){
                
                $('.overlay').addClass('active');
                $('.popup').addClass('active');
            }else{
               
                $('.toast-body').html(datosTraidos);
                $('.toast').toast('show');
                
            }
        }
    });
});

