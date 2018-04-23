$(document).ready(function () {
    //Si se pulsa en entrar:
    $('#entrar').on("click",function (e) {
        e.preventDefault();
        // pasamos a controlar que se hayan rellenado los campos de usuario y contraseña, para eso creamos la variable erroes y la ponemos a 0
        var error = 0;
        // si el campo usuario está vacio, sumamos 1 a error y visualizamos un mensajes

        if($('#usuario').val()==''){
            error++;
            $('#errorusuario').html('Introduzca su nombre de usuario');
        }else{
            $('#errorusuario').html('&nbsp;');
        }
        // si el campo password está vacio, sumamos 1 a error y visualizamos un mensajes

        if($('#password').val()==''){
            error++;
            $('#errorpassword').html('Introduzca su contraseña');
        }else{
            $('#errorpassword').html('&nbsp;');
        }
        //Si error = 0 quiere decir que tanto el cmapo usuario como el campo password están completos y pasamos a enviarlos
        // por Ajax a ajax_login.php que se encargará de validar el usuario y devoler una respuesta
        if(error==0){
            // Creamos el array que contendrá los valores de los campos usuario y contraseña, así como el tipo de accion
            // a realizar, en este caso login
            var parametros={
                "usuario":$('#usuario').val(),
                "password":$('#password').val(),
                "accion": "login"
            };

            $.ajax({
                data: parametros,
                url: 'app/ajax_login.php',
                type: 'post',
                beforesend: function () {

                },
                success: function(response){
                    //Valoramos la respuesta de ajax_login.php que será:
                    // 0: si el usuario no existe
                    // 1: si el usuario existe pero no coincide el password
                    // 2 : si usuario y password coinciden.

                    switch (response){
                        case '0':
                            //Usuario no existe
                            $('#errorusuario').html('El usuario no existe.');
                            break;
                        case '1':
                            //Password no coincide

                            $('#errorpassword').html('Contraseña incorrecta.');
                            break;
                        case '2':
                            //Usuario y password correctos. Redireccionas a principal.php con la sesión creada.

                            $('#errorusuario, errorpassword').html('');

                            window.location.href='principal.php';
                            break;

                    }





                }

            });

        }
    });
    $('#registrar').on("click",function (e) {
        e.preventDefault();
        // pasamos a controlar que se hayan rellenado los campos de usuario y contraseña, para eso creamos la variable erroes y la ponemos a 0
        var error = 0;
        // si el campo usuario está vacio, sumamos 1 a error y visualizamos un mensajes
        if($('#usuario').val()==''){
            error++;
            $('#errorusuario').html('Introduzca un nombre de usuario');
        }else{
            $('#errorusuario').html('&nbsp;');
        }
        // si el campo password está vacio, sumamos 1 a error y visualizamos un mensajes
        if($('#password').val()==''){
            error++;
            $('#errorpassword').html('Introduzca una contraseña');
        }else{
            $('#errorpassword').html('&nbsp;');
        }
        //Si error = 0 quiere decir que tanto el cmapo usuario como el campo password están completos y pasamos a enviarlos
        // por Ajax a ajax_login.php que se encargará de validar el usuario y devoler una respuesta
        if(error==0){
            // Creamos el array que contendrá los valores de los campos usuario y contraseña, así como el tipo de accion
            // a realizar, en este caso registro
            var parametros={
                "usuario":$('#usuario').val(),
                "password":$('#password').val(),
                "accion": "registro"
            };
            $.ajax({
                data: parametros,
                url: 'app/ajax_login.php',
                type: 'post',
                beforesend: function () {

                },
                success: function(response){

                    switch (response){
                        //Valoramos la respuesta de ajax_login.php que será:
                        // 0: si el usuario ya existe
                        // 1: si el usuario  no

                        case '0':
                            //Usuario ya existe

                            $('#errorusuario').html('El usuario ya existe.');
                            break;

                        case '1':
                            //Usuario creado correctamente
                            //Redireccionas a principal.php con la sesión creada.

                            $('#errorusuario, errorpassword').html('');

                            window.location.href='principal.php';
                            break;

                    }





                }

            });

        }

    });
});