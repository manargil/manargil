function checkRegister(){
    let user = $('#user').val();
    let pass = $('#pass').val();
    let email = $('#email').val();
    let direccion = $('#direccion').val();
    let fechanac = $('#fecha_nac').val();

    let passExpression = /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
    let emailExpression = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;

    if(user != '' && user.length >= 4 && user.length <= 24){
        if(pass != '' && passExpression.test(pass)){
          if(email != '' && emailExpression.test(email)){
            //EJECUTAMOS AJAX
            
            $.ajax({
                method:'POST',
                'url':'../usuariocontroller/register',
                'dataType':'JSON',
                'data':{
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
                           title: "Registro completado.",
                           confirmButtonText: "Aceptar",
                       }).then((result) => {
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
                title: "Direcci??n de correo no v??lida.",
                confirmButtonText: "Aceptar",
                html:'El email debe ser v??lido. </br> <p><i>Ej: correo@dominio.com</i></p>'
            });
          }

        }else{
          Swal.fire({
              icon:'error',
              title: "Contrase??a no v??lida.",
              confirmButtonText: "Aceptar",
              text:'La contrase??a debe contener entre 4 y 16 car??cteres, al menos un n??mero, una may??scula y una min??scula y un car??cter especial.'
          });
        }
    }else{
      Swal.fire({
          icon:'error',
          title: "Usuario no v??lido.",
          text:'El nombre de usuario debe contener entre 8 y 16 car??cteres, una may??scula y una min??scula y un car??cter especial.',
          confirmButtonText: "Aceptar",
      });
    }

}


$(document).ready(function(){
    console.log("LINK READY");

    $("#registerbtn").click(function(){
      //console.log("exe");
      checkRegister();
    });

});
