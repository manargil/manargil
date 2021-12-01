function checkProducto(){
    let nombre = $('#nombre').val();
    let precio = $('#precio').val();
    let stock = $('#stock').val();
    let imagen = $('#imagen').val();

    if(nombre != '' && nombre.length >= 4 && nombre.length <= 34){
        if(precio != '' && precio.length >= 2 && precio.length <= 10){
          if(stock != '' && stock.length >= 1 && stock.length <= 3){
            //EJECUTAMOS AJAX
            
            $.ajax({
                method:'POST',
                'url':'../usuariocontroller/agregarproductos',
                'dataType':'JSON',
                'data':{
                    'nombre':nombre,
                    'precio':precio,
                    'stock':stock,
                    'imagen':imagen   
                },
                success:function(data){

                   if(data.STATUS == 'OK'){

                       Swal.fire({
                           icon:'success',
                           title: "Registro completado.",
                           confirmButtonText: "Aceptar",
                       }).then((result) => {
                         $('#nombre').val('');
                         $('#precio').val('');
                         $('#stock').val('');
                         $('#imagen').val('');
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
                title: "Stock no válido.",
                confirmButtonText: "Aceptar",
                html:'Stock entre 1 numero y 3. </br> <p><i>Ej: 5,45,123</i></p>'
            });
          }

        }else{
          Swal.fire({
              icon:'error',
              title: "Precio no valido.",
              confirmButtonText: "Aceptar",
              text:'El precio debe tener entr 2 y 10 caracteres.'
          });
        }
    }else{
      Swal.fire({
          icon:'error',
          title: "Nombre no válido.",
          text:'El nombre 4 y 34 carácteres, una mayúscula y una minúscula y un carácter especial.',
          confirmButtonText: "Aceptar",
      });
    }

}


$(document).ready(function(){
    console.log("LINK READY");

    $("#productobtn").click(function(){
      //console.log("exe");
      checkProducto();
    });

});
