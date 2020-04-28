$(document).ready(function(){
    
    $('#login-admin').on('submit', function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                if(resultado.respuesta == 'exitoso'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Login correcto',
                        text: 'Bienvenid@ '+resultado.usuario+' !! '
                    });
                    setTimeout(function(){
                        window.location.href = 'admin-area.php';
                    },2000);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Usuario o password incorrectos.'
                    });
                }
            }
        });
    });

});