function checkLogin(){
    $user = $('#username').val();
    $pass = $('#password').val();
    
    if($user != ''){
        if($pass != ''){
            //EJECUTAMOS AJAX
            console.log("vamos a ejecutar ajax");
            $.ajax({
                method:'POST',
                'url':'logincontroller/login',
                'dataType':'JSON',
                'data':{
                    'user':$user,
                    'pass':$pass
                },
                success:function(data){
                    
                    console.log("success");
                  
                   if(data.STATUS == 'OK'){
                       console.log("TODO OK, ESTA REGISTRADO");
                       location.href="main";
                       //location.reload();
                   }else if(data.STATUS == 'ERROR'){
                        console.log("ERROR DE LOGIN");
                        Swal.fire({
                            icon:'error',
                            title: "Contraseña no válida.",
                            confirmButtonText: "Aceptar",
                            text:'La contraseña debe contener entre 8 y 16 carácteres, al menos un número, una mayúscula y una minúscula y no alfanumérico.'
                        });
                   }else{
                       console.log("ERROR DESCONOCIDO");
                   }
                },
                error:function(data){
                    console.log(data);
                    console.log("error");
                }
            });

        }else{
            alert('No hay pass');
        }
    }else{
        alert('No hay user');
    }

}

function logout(){

    $.ajax({
        method:'POST',
        'url':'logincontroller/logout',
        'dataType':'JSON',
        'data':{
        },
        success:function(data){
           console.log(data.STATUS);
           if(data.STATUS == 'OK'){
               console.log("TODO OK, ESTA REGISTRADO");
               location.reload();
           }else if(data.STATUS == 'ERROR'){
                console.log("ERROR DE LOGIN");
           }else{
               console.log("ERROR DESCONOCIDO");
           }
        },
        error:function(msg,xhr){
            console.log(msg);
            console.log(xhr);

        }
    });

}

$(document).ready(function(){
    console.log("LINK READY");

    $("#loginbtn").click(function(){
        checkLogin();
    });

    $("#logoutbtn").click(function(){
        logout();
    })

});



