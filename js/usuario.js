$(document).ready(function () {
    //Si hacemos click en la página con algún mensaje visible, se oculta el mensaje
    $('body').click(function () {
        $('#tapa').fadeOut('1');
    });
    //Al hacer click en el enlace obtener código promocional
    $('#obtnuevocupon').click(function (e) {
        e.preventDefault();
        // Creamos el array que contendrá el tipo de accion a realizar, en este caso nuevo
        var parametros={ "accion": "nuevo"};
        //Enviamos la petición a ajax_usuario.php el cual se encargará de realizar la operación
        $.ajax({
            data: parametros,
            url: "app/ajax_usuario.php",
            type: "POST",
            beforesend: function () {

            },
            success: function (response) {
                //Abrimos el mensaje de 'Nuevo código añadido'
                $('.mensaje').html("Nuevo código añadido");
                $('#tapa').fadeIn('1');
                var csnuevo={
                    'transform':'scale(1)',
                    '-msm-transform':'scale(1)'
                }
                $('.mensaje').css(csnuevo);
                //Cargamos la respuesta de ajax_usuario.php la cual está compuesta por lista_cupones.php
                // que generará el html necesario para visualizar la lista de códigos promocionales del usuario y
                // lo visualizamos en el div listadecupones
                $('#listadecupones').html(response);

            }
        })
    });
    $(document).on("click","a[name='canjearcupon']",function (e) {

        e.preventDefault();
        var idcupon=$(this).attr('data-codigocupon');
        // Creamos el array que contendrá el id del código pormocional y tipo de accion a realizar, en este caso canjear
        var parametros={ 'idcupon': $(this).attr('data-idcupon'), "accion":"canjear"};
        //Enviamos la petición a ajax_usuario.php el cual se encargará de realizar la operación
        $.ajax({
            data: parametros,
            type: "POST",
            url: "app/ajax_usuario.php",
            beforsend : function () {

            },
            success: function (response) {
                //Abrimos el mensaje de 'Código x canjeado'
                $('.mensaje').html("Código "+idcupon+" canjeado");
                $('#tapa').fadeIn('1');
                var csnuevo={
                    'transform':'scale(1)',
                    '-msm-transform':'scale(1)'
                }
                $('.mensaje').css(csnuevo);
                //Cargamos la respuesta de ajax_usuario.php la cual está compuesta por lista_cupones.php
                // que generará el html necesario para visualizar la lista de códigos promocionales del usuario y
                // lo visualizamos en el div listadecupones
                $('#listadecupones').html(response);

            }
        });
    });
});