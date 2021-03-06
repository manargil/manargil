function updateusuario(){
    let id = $('#usuarioid').val();
    let user = $('#user').val();
    let pass = $('#pass').val();
    let email = $('#email').val();
    let direccion = $('#direccion').val();
    let fechanac = $('#fech_nac').val();

    let passExpression = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
    let emailExpression = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

    console.log('texto',pass);
    if(user != '' && user.length >= 4 && user.length <= 24){
        if(pass != '' && passExpression.test(pass)){
          if(email != '' && emailExpression.test(email)){
            //EJECUTAMOS AJAX
            
            $.ajax({
                method:'POST',
                'url':'../usuariocontroller/update',
                'dataType':'JSON',
                'data':{
                    'usuarioid':id,
                    'user':user,
                    'pass':pass,
                    'email':email,
                    'direccion':direccion,
                    'fech_nac':fechanac
                },
                success:function(data){

                   if(data.STATUS == 'OK'){

                       Swal.fire({
                           icon:'success',
                           title: "Edición modificada.",
                           confirmButtonText: "Aceptar",
                       }).then((result) => {
                         $('#usuarioid').val('');
                         $('#user').val('');
                         $('#pass').val('');
                         $('#email').val('');
                         $('#direccion').val('');
                        $('#fecha_nac').val('');
                          });

                   }else if(data.STATUS == 'ERROR'){
                        console.log("ERROR DE REGISTRO");
                   }else{
                       console.log("ERROR DESCONOCIDO");
                   }
                },
                error:function(data){
                    console.log(data);
                }
            });
          }else{
            Swal.fire({
                icon:'error',
                title: "Dirección de correo no válida.",
                confirmButtonText: "Aceptar",
                html:'El email debe ser válido. </br> <p><i>Ej: correo@dominio.com</i></p>'
            });
          }

        }else{
          Swal.fire({
              icon:'error',
              title: "Contraseña no válida.",
              confirmButtonText: "Aceptar",
              text:'La contraseña debe contener entre 4 y 16 carácteres, al menos un número, una mayúscula y una minúscula y un carácter especial.'
          });
        }
    }else{
      Swal.fire({
          icon:'error',
          title: "Usuario no válido.",
          text:'El nombre de usuario debe contener entre 8 y 16 carácteres, una mayúscula y una minúscula y un carácter especial.',
          confirmButtonText: "Aceptar",
      });
    }

}


$(document).ready(function(){
    console.log("LINK READY");

    $("#modbtn").click(function(){
      //console.log("exe");
      updateusuario();
    });

});
