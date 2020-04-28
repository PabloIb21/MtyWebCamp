$(document).ready(function(){
    
    $('#guardar-registro').on('submit', function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Se guardó correctamente.'
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error'
                    });
                }
            }
        });
    });

    // se ejecuta cuando hay un archivo
    $('#guardar-registro-archivo').on('submit', function(e){
        e.preventDefault();
        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data){
                console.log(data);
                var resultado = data;
                if(resultado.respuesta == 'exito'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Se guardó correctamente.'
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error'
                    });
                }
            }
        });
    });

    // Eliminar un registro
    $('.borrar_registro').on('click', function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Un registro eliminado no se puede recuperar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'post',
                    data: {
                        'id': id,
                        'registro' : 'eliminar'
                    },
                    url: 'modelo-'+tipo+'.php',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if(data.respuesta == 'exito') {
                            Swal.fire(
                                'Eliminado!',
                                'Registro eliminado.',
                                'success'
                            );
                            jQuery('[data-id="'+data.id_eliminado+'"]').parents('tr').remove();  
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se pudo eliminar este registro'
                            });
                        }
                    }
                });   
            }
        });
    });

});