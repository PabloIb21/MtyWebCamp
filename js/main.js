$(function(){

    // Letering
    $('.nombre-sitio').lettering();

    // Menú fijo
    var windowHeight = $(window).height();
    var barraAltura = $('.barra').innerHeight();

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight){
            $('.barra').addClass('fixed');
            $('body').css({'margin-top': barraAltura+'px'});
        }else{
            $('.barra').removeClass('fixed');
            $('body').css({'margin-top':'0px'});
        }
    });

    // Agregar clase a Menú
    $('.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo');
    $('.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
    $('.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');

    // Menú Responsive

    $('.menu-movil').on('click', function(){
        $('.navegacion-principal').slideToggle();
    });

    // Programa de Conferencias
    $('.programa-evento .info-curso:first').show();
    $('.menu-programa a:first').addClass('activo');

    $('.menu-programa a').on('click',function(){
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();

        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);

        return false;
    });

    // Animaciones para los Números
    $('.resumen-evento li:nth-child(1) p').animateNumber({number: 6},1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({number: 15},1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({number: 3},1500);
    $('.resumen-evento li:nth-child(4) p').animateNumber({number: 9},1500);

    // Cuenta regresiva
    $('.cuenta-regresiva').countdown('2020/12/10 9:00:00',function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    // Colorbox
    $('.invitado-info').colorbox({inline:true, width:"50%"});
    $('.boton_newsletter').colorbox({inline:true, width:"50%"});
});