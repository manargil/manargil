var adminPanel={
    data:function(){
      return{
        selected:"",
        usuario:"",
        pass:"",
        pass2:"",
        correo:"",
        tipoUsuario:"cliente",
        errorUsuario:false,
        errorPass:false,
        errorPass2:false,
        errorCorreo:false,
        usuarios:[],
        atareado:"",
        textotarea:"",
        prioridad:"",
        perfil:"",
        nombre:"",
        perro:"",
        necesidades:"",
        telefono:"",
        viene_de:"",
        errorTelefono:false,
        datos_relevantes:"",
        tareas:[],
        mostrarFinalizadas:false,
        numResults:8,
        pag:1,
        tareaFin:"tarea-finalizada",
        editTarea:false,
        edit_id_tarea:"",
        edit_id_usuario:"",
        edit_username:"",
        edit_fecha_completada:"",
        edit_comentario:"",
        arrayBusquedaTareas:[],
        arrayBusquedaCrms:[],
        arrayBusquedaCitas:[],
        busquedaActiva:false,
        aBuscar:"",
        filtrosBusqueda:[],
        es: vdp_translation_es.js,
        cita:{
          fecha:new Date(),
          adiestrador:"",
          cliente:"",
          titulo:"",
          mensaje:"",
          poblacion:""
        },
        usuariosMod:[],
        editUsuario:false,
        aBuscarUSuario:"",
        arrayBusquedaUsuariosMod:[],
        edit_usuario:"",
        edit_tipo_usuario:"",
        edit_email:"",
        clientes:[],
        adiestradores:[],
        citaHora:"",
        citas:[],
        aBuscarCita:""
      }
    },
    components:{
       "vuejs-datepicker":vuejsDatepicker
    },
    methods:{
      debug:function(string){
        console.log(string);
      },
   
      quitarFiltros:function(){
        this.busquedaActiva = false;
        this.tareas=this.arrayBusquedaTareas;
        this.crms=this.arrayBusquedaCrms;
        this.citas=this.arrayBusquedaCitas;
        this.filtrosBusqueda=[];
      },
      guardarEditUsuario:function(){
        var self=this;
  
        $.ajax({
          type:"POST",
          url:"administracion/guardarModUsuario",
          data:{
            id_usuario:self.edit_id_usuario,
            usuario:self.edit_usuario,
            email:self.edit_email
          },
          datatype:"Json",
          success: function(msg){
            console.log("MSG"+msg);
            msg = msg.slice(msg.indexOf('{"'), msg.length);
            var jsonMsg;
            try{
              jsonMsg = JSON.parse(msg);
            }catch(err){
              console.log("Mensaje err: "+err);
            }
            if(jsonMsg === undefined){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Datos mal recibidos'
              });
            }else if(jsonMsg.resultado == false){
              Swal.fire({
                icon: 'warning',
                title: 'No se ha modificado.',
                text: 'El servidor ha devuelto un error.'
              });
            }else{
              Swal.fire({
                icon: 'success',
                title: '¡Ya está!',
                text: 'Se ha modificado el usuario.'
              })
  
              self.changePanel('modusuarios');
              self.editarUsuario();
            }
          },
          error:function(){
            Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: 'Error en el código.'
            });
          }
        })
      },
      changePanel:function(seleccionado){
        this.usuarios="";
        this.tareas="";
        this.crms="";
        this.filtrosBusqueda=[];
        if(seleccionado=='tarea'){
          var self = this;
          $.ajax({
            type:"POST",
            url:"administracion/mostrarUsuarios",
            datatype:"Json",
            success: function(msg){
              msg = msg.slice(msg.indexOf('{"'), msg.length);
              var jsonMsg;
              try{
                jsonMsg = JSON.parse(msg);
              }catch(err){
                console.log("Mensaje err: "+err);
              }
              if(jsonMsg === undefined){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Datos mal recibidos'
                });
              }else{
              self.usuarios=jsonMsg.resultado;
              }
            },
            error:function(){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Error en el código.'
              });
            }
          })
        }else if(seleccionado == 'crm'){
          var self = this;
  
        }else if(seleccionado == 'modusuarios'){
          var self = this;
          $.ajax({
            type:"POST",
            url:"administracion/mostrarModUsuarios",
            datatype:"Json",
            success: function(msg){
              msg = msg.slice(msg.indexOf('{"'), msg.length);
              var jsonMsg;
              try{
                jsonMsg = JSON.parse(msg);
              }catch(err){
                console.log("Mensaje err: "+err);
              }
              if(jsonMsg === undefined){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Datos mal recibidos'
                });
              }else if(jsonMsg.resultado == ""){
                Swal.fire({
                  icon: 'info',
                  title: '¡Lista vacía!',
                  text: 'Todos los usuarios tienen un CRM.'
                });
              }else{
                console.log(jsonMsg.resultado);
                self.usuariosMod=jsonMsg.resultado;
                self.arrayBusquedaUsuariosMod=jsonMsg.resultado;
                console.log(self.usuariosMod);
              }
            },
            error:function(){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Error en el código.'
              });
            }
          })
        }
        this.selected=seleccionado;
      },
      validarMail:function(mail){
          let regExpEmail = new RegExp(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/);
          if(regExpEmail.test(mail)){
            return true;
          }else{
            return false;
          }
      },validarTelefono:function(telefono){
        let regExpTelefono = new RegExp(/^[9|6|7]{1}([\d]{2}[-]*){3}[\d]{2}$/);
  
        if(regExpTelefono.test(telefono)){
          return true;
        }else{
          return false;
        }
      },checkNombre:function(){
        if( this.nombre== ""){
          this.errorNombre = true;
        }else{
          this.errorNombre = false;
        }
      },checkPerro:function(){
        if( this.Perro== ""){
          this.errorPerro = true;
        }else{
          this.errorPerro = false;
        }
      },
      checkUsuario:function(){
        if(this.usuario.length < 3){
          this.errorUsuario = true;
        }else{
          this.errorUsuario = false;
        }
      },
      checkPass:function(){
        if(this.pass.length<6){
          this.errorPass=true;
        }else{
          this.errorPass=false;
        }
      },
      checkPass2:function(){
        if(this.pass != this.pass2){
          this.errorPass2=true;
        }else{
          this.errorPass2=false;
        }
      },
      checkCorreo:function(){
        if(!this.validarMail(this.correo)){
          this.errorCorreo = true;
        }else{
          this.errorCorreo = false;
        }
      },
      buscar:function(){
        this.busquedaActiva=true;
        if(this.aBuscar != ""){
          this.filtrosBusqueda.push(this.aBuscar);
        }
         this.tareas = this.tareas.filter(obj =>
          obj.username.toLowerCase().includes(this.aBuscar.toLowerCase()) ||
          obj.fecha_tarea.includes(this.aBuscar)
        );
        this.aBuscar="";
      },
      buscarCita:function(){
        this.busquedaActiva=true;
        console.log(this.citas);
        if(this.aBuscarCita != ""){
          this.filtrosBusqueda.push(this.aBuscarCita);
        }
         this.citas = this.citas.filter(obj =>
          obj.nombre_cliente.toLowerCase().includes(this.aBuscarCita.toLowerCase()) ||
          obj.nombre_empleado.toLowerCase().includes(this.aBuscarCita.toLowerCase()) ||
          obj.start.includes(this.aBuscarCita)
        );
        this.aBuscarCita="";
      },
      buscarCrm:function(){
        this.busquedaActiva=true;
        if(this.aBuscarCrm != ""){
          this.filtrosBusqueda.push(this.aBuscarCrm);
        }
        this.crms = this.crms.filter(obj =>
         obj.nombre_cliente.toLowerCase().includes(this.aBuscarCrm.toLowerCase()) ||
         obj.username.toLowerCase().includes(this.aBuscarCrm.toLowerCase())
       );
       this.aBuscarCrm="";
      },
      editarTarea:function(id_usuario, username, tarea, fecha_tarea, fecha_completada, prioridad, creada_por, creada_por_usu, comentario, id_tarea){
        if(this.editTarea==false){
          this.editTarea = true;
          this.edit_id_tarea=id_tarea;
          this.edit_tarea=tarea;
          this.edit_id_usuario=id_usuario;
          this.edit_username=username;
          this.edit_fecha_tarea=fecha_tarea;
          this.edit_fecha_completada=fecha_completada;
          this.edit_prioridad=prioridad;
          this.edit_creada_por=creada_por;
          this.edit_creada_por_usu=creada_por_usu;
          this.comentario=comentario;
        }else{
          this.editTarea=false;
          this.edit_id_tarea="";
          this.edit_id_usuario="";
          this.edit_tarea="";
          this.edit_username="";
          this.edit_fecha_tarea="";
          this.edit_fecha_completada="";
          this.edit_prioridad="";
          this.edit_creada_por="";
          this.edit_creada_por_usu="";
          this.comentario="";
        }
  
      },
      eliminarTarea:function(id_usuario, username, id_tarea){
          Swal.fire({
            title: '¿Estás seguro de eliminar el objetivo de '+id_usuario+"-"+username+'?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Sí, eliminar.`,
            denyButtonText: `No, no eliminar.`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              var self = this;
  
              $.ajax({
                type:"POST",
                url:"administracion/eliminarTarea",
                data:{
                  id_tarea:id_tarea
                },
                datatype:"Json",
                success: function(msg){
                  console.log("MSG"+msg);
                  msg = msg.slice(msg.indexOf('{"'), msg.length);
                  var jsonMsg;
                  try{
                    jsonMsg = JSON.parse(msg);
                  }catch(err){
                    console.log("Mensaje err: "+err);
                  }
                  if(jsonMsg === undefined){
                    Swal.fire({
                      icon: 'error',
                      title: '¡Error!',
                      text: 'Datos mal recibidos'
                    });
                  }else if(jsonMsg.resultado == false){
                    Swal.fire({
                      icon: 'warning',
                      title: 'No se ha eliminado.',
                      text: 'El servidor ha devuelto un error.'
                    });
                  }else{
                    Swal.fire({
                      icon: 'success',
                      title: '¡Ya está!',
                      text: 'Se ha eliminado el objetivo.'
                    })
                    .then((result) => {
                        self.changePanel('modtareas');
                    });
  
                  }
                },
                error:function(){
                  Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Error en el código.'
                  });
                }
              })
            } else if (result.isDenied) {
              Swal.fire('El objetivo no se ha eliminado.', '', 'info')
            }
        })
      },
      confirmarTarea:function(){
  
        var self = this;
  
        $.ajax({
          type:"POST",
          url:"administracion/modificarTarea",
          data:{
            id_tarea:self.edit_id_tarea,
            tarea:self.edit_tarea,
            prioridad:self.edit_prioridad
          },
          datatype:"Json",
          success: function(msg){
            console.log("MSG"+msg);
            msg = msg.slice(msg.indexOf('{"'), msg.length);
            var jsonMsg;
            try{
              jsonMsg = JSON.parse(msg);
            }catch(err){
              console.log("Mensaje err: "+err);
            }
            if(jsonMsg === undefined){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Datos mal recibidos'
              });
            }else if(jsonMsg.resultado == false){
              Swal.fire({
                icon: 'warning',
                title: 'No se ha modificado nada.',
                text: 'No se ha modificado nada ya que no introdujiste cambios o debido a un error inesperado.'
              });
            }else{
              Swal.fire({
                icon: 'success',
                title: '¡Bien!',
                text: 'Se han guardado los cambios'
              })
              .then((result) => {
                  self.changePanel('modtareas');
                  self.editarTarea();
              });
  
            }
          },
          error:function(){
            Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: 'Error en el código.'
            });
          }
        })
      },
      modificarCrm:function(id_usuario,username,nombre_cliente,perro,necesidades,viene_de,telefono,e_mail,datos_relevantes){
        if(this.editCrm == false){
          this.editCrm = true;
          this.edit_id_user_crm=id_usuario;
          this.edit_user_crm=username;
          this.edit_nombre_cliente_crm=nombre_cliente;
          this.edit_perro_crm=perro;
          this.edit_necesidades_crm=necesidades;
          this.edit_viene_de_crm=viene_de;
          this.edit_telefono_crm=telefono;
          this.edit_email_crm=e_mail;
          this.edit_datos_relevantes_crm=datos_relevantes;
        }else{
          this.editCrm = false;
          this.edit_id_user_crm="";
          this.edit_user_crm="";
          this.edit_nombre_cliente_crm="";
          this.edit_perro_crm="";
          this.edit_necesidades_crm="";
          this.edit_viene_de_crm="";
          this.edit_telefono_crm="";
          this.edit_email_crm="";
          this.edit_datos_relevantes_crm="";
        }
      },
      confirmarCrm:function(){
        if(this.validarMail(this.edit_email_crm) && this.validarTelefono(this.edit_telefono_crm)){
          var self = this;
          $.ajax({
            type:"POST",
            url:"administracion/confirmarCrm",
            data:{
              id_user_crm:this.edit_id_user_crm,
              telefono:this.edit_telefono_crm,
              datos:this.edit_datos_relevantes_crm,
              e_mail:this.edit_email_crm
            },
            datatype:"Json",
            success: function(msg){
              console.log(msg);
              msg = msg.slice(msg.indexOf('{"'), msg.length);
              var jsonMsg;
              try{
                jsonMsg = JSON.parse(msg);
              }catch(err){
                console.log("Mensaje err: "+err);
              }
              if(jsonMsg === undefined){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Datos mal recibidos'
                });
              }else if(jsonMsg.resultado == false){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'No se han guardado los cambios debido a un error inesperado.'
                });
              }else{
                Swal.fire({
                  icon: 'success',
                  title: '¡Cambios guardados!',
                  text: 'Los cambios se han guardado con éxito.'
                }).then((result) => {
                    self.changePanel('modcrm');
                    self.modificarCrm();
                });
              }
            },
            error:function(){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Error en el código.'
              });
            }
          })
        }else{
          Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: 'El e-mail o el teléfono no son válidos.'
            })
        }
      },eliminarCrm:function(id_cliente, nombre_cliente){
        Swal.fire({
          title: '¿Estás seguro de eliminar el CRM de '+id_cliente+"-"+nombre_cliente+'?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: `Sí, eliminar.`,
          denyButtonText: `No, no eliminar.`,
      }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            var self = this;
  
            $.ajax({
              type:"POST",
              url:"administracion/eliminarCrm",
              data:{
                id_cliente:id_cliente
              },
              datatype:"Json",
              success: function(msg){
                console.log("MSG"+msg);
                msg = msg.slice(msg.indexOf('{"'), msg.length);
                var jsonMsg;
                try{
                  jsonMsg = JSON.parse(msg);
                }catch(err){
                  console.log("Mensaje err: "+err);
                }
                if(jsonMsg === undefined){
                  Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Datos mal recibidos'
                  });
                }else if(jsonMsg.resultado == false){
                  Swal.fire({
                    icon: 'warning',
                    title: 'No se ha modificado nada.',
                    text: 'No se ha modificado nada ya que no introdujiste cambios o debido a un error inesperado.'
                  });
                }else{
                  Swal.fire({
                    icon: 'success',
                    title: '¡Ya está!',
                    text: 'Se ha eliminado el CRM y todas sus interacciones.'
                  })
                  .then((result) => {
                      self.changePanel('modcrm');
                  });
  
                }
              },
              error:function(){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Error en el código.'
                });
              }
            })
          } else if (result.isDenied) {
            Swal.fire('El CRM no se ha eliminado.', '', 'info')
          }
      })
      },
      mostrarInteracciones:function(id_cliente, username){
        this.interacciones="";
        this.interaccion=false;
        this.interaccion_para=id_cliente;
        if(this.showInteracciones == false){
          this.showInteracciones = true;
          var self = this;
          $.ajax({
            type:"POST",
            url:"administracion/mostrarInteracciones",
            data:{
              id_cliente:id_cliente
            },
            datatype:"Json",
            success: function(msg){
              msg = msg.slice(msg.indexOf('{"'), msg.length);
              var jsonMsg;
              try{
                jsonMsg = JSON.parse(msg);
              }catch(err){
                console.log("Mensaje err: "+err);
              }
              if(jsonMsg === undefined){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Datos mal recibidos'
                });
              }else if(jsonMsg.resultado == false){
                self.userInteracciones = username;
                Swal.fire({
                  icon: 'info',
                  title: '¡Vacío!',
                  text: 'Este cliente aún no tiene interacciones.'
                });
              }else{
                self.userInteracciones = username;
                self.interacciones=jsonMsg.resultado;
              }
            },
            error:function(){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Error en el código.'
              });
            }
          })
        }else{
          this.showInteracciones = false;
        }
      },nuevaInteraccion:function(){
        if(this.interaccion == false){
          this.interaccion = true;
        }else{
          this.interaccion = false;
        }
      },guardarInteraccion:function(){
  
        var self = this;
        $.ajax({
          type:"POST",
          url:"administracion/guardarInteraccion",
          data:{
            interaccion_para:this.interaccion_para,
            mensaje:this.interaccion_mensaje
          },
          datatype:"Json",
          success: function(msg){
            msg = msg.slice(msg.indexOf('{"'), msg.length);
            var jsonMsg;
            try{
              jsonMsg = JSON.parse(msg);
            }catch(err){
              console.log("Mensaje err: "+err);
            }
            if(jsonMsg === undefined){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Datos mal recibidos'
              });
            }else if(jsonMsg.resultado == false){
              self.userInteracciones = username;
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'No se ha podido guardar la interacción.'
              });
            }else{
              this.interaccion_mensaje="";
              Swal.fire({
                icon: 'success',
                title: '¡Hecho!',
                text: 'Se ha guardado la interacción.'
              })
              .then((result) => {
                  self.mostrarInteracciones();
              });
            }
          },
          error:function(){
            Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: 'Error en el código.'
            });
          }
        })
  
      },eliminarInteraccion:function(id_interaccion){
        Swal.fire({
          title: '¿Estás seguro de eliminar esta interaccion?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: `Sí, eliminar.`,
          denyButtonText: `No, no eliminar.`,
      }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            var self = this;
  
            $.ajax({
              type:"POST",
              url:"administracion/eliminarInteraccion",
              data:{
                id_interaccion:id_interaccion
              },
              datatype:"Json",
              success: function(msg){
                console.log("MSG"+msg);
                msg = msg.slice(msg.indexOf('{"'), msg.length);
                var jsonMsg;
                try{
                  jsonMsg = JSON.parse(msg);
                }catch(err){
                  console.log("Mensaje err: "+err);
                }
                if(jsonMsg === undefined){
                  Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Datos mal recibidos'
                  });
                }else if(jsonMsg.resultado == false){
                  Swal.fire({
                    icon: 'warning',
                    title: 'No se ha modificado nada.',
                    text: 'La interacción no ha podido ser eliminada.'
                  });
                }else{
                  Swal.fire({
                    icon: 'success',
                    title: '¡Ya está!',
                    text: 'Se ha eliminado la interacción.'
                  })
                  .then((result) => {
  
                      self.mostrarInteracciones();
                  });
  
                }
              },
              error:function(){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Error en el código.'
                });
              }
            })
          } else if (result.isDenied) {
            Swal.fire('La interacción no se ha eliminado.', '', 'info')
          }
      })
      },
      editarUsuario:function(edit_usuario, id_usuario, e_mail, tipo_usuario){
        if(this.editUsuario==false){
          this.editUsuario=true;
          this.edit_usuario=edit_usuario;
          this.edit_id_usuario=id_usuario;
          this.edit_tipo_usuario=tipo_usuario;
          this.edit_email=e_mail;
        }else{
          this.editUsuario=false;
          this.edit_usuario="";
          this.edit_id_usuario="";
          this.edit_tipo_usuario="";
          this.edit_email="";
        }
      },
      eliminarUsuario:function(id_usuario){
        Swal.fire({
          title: '¿Estás seguro de eliminar el usuario? Recordamos que solo se eliminará si no tiene un CRM o no está en la tabla empleados.',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: `Sí, eliminar.`,
          denyButtonText: `No, no eliminar.`,
      }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            var self = this;
  
            $.ajax({
              type:"POST",
              url:"administracion/eliminarUsuario",
              data:{
                id_usuario:id_usuario
              },
              datatype:"Json",
              success: function(msg){
                console.log("MSG"+msg);
                msg = msg.slice(msg.indexOf('{"'), msg.length);
                var jsonMsg;
                try{
                  jsonMsg = JSON.parse(msg);
                }catch(err){
                  console.log("Mensaje err: "+err);
                }
                if(jsonMsg === undefined){
                  Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Parece que el usuario tiene un CRM asociado o es un emplead, intenta eliminar esto antes.'
                  });
                }else if(jsonMsg.resultado == false){
                  Swal.fire({
                    icon: 'warning',
                    title: 'No se ha eliminado.',
                    text: 'El servidor ha devuelto un error.'
                  });
                }else{
                  Swal.fire({
                    icon: 'success',
                    title: '¡Ya está!',
                    text: 'Se ha eliminado el usuario.'
                  })
                  .then((result) => {
                      self.changePanel('modusuarios');
                  });
                }
              },
              error:function(){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Error en el código.'
                });
              }
            })
          } else if (result.isDenied) {
            Swal.fire('La cita no se ha eliminado.', '', 'info')
          }
      })
      },
      checkTelefono:function(){
        if(!this.validarTelefono(this.telefono)){
          this.errorTelefono = true;
        }else{
          this.errorTelefono = false;
        }
      },
      comprueba:function(){
  
        if(this.errorUsuario || this.errorPass || this.errorPass2 || this.errorCorreo){
  
          Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: '¡Por favor soluciona los errores antes de enviar!'
            })
        }else{
          var self=this;
          $.ajax({
            type:"POST",
            url:"administracion/nuevoUsuario",
            data:{
              correo:self.correo,
              usuario:self.usuario,
              pass:self.pass,
              tipoUsuario:self.tipoUsuario
            },
            datatype:"Json",
            success: function(msg){
              console.log(msg);
              msg = msg.slice(msg.indexOf('{"'), msg.length);
              var jsonMsg;
              try{
                jsonMsg = JSON.parse(msg);
              }catch(err){
                console.log("Mensaje err: "+err);
              }
              if(jsonMsg === undefined){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Datos mal recibidos'
                });
              }else if(jsonMsg.resultado === false){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'No se ha podido crear el usuario.'
                });
              }else if(jsonMsg.resultado === true){
                Swal.fire({
                  icon: 'success',
                  title: '¡Ya está!',
                  text: 'Usuario registrado con éxito.'
                });
                self.usuario="";
                self.pass="";
                self.pass2="";
                self.nombre="";
                self.correo="";
              }else{
                Swal.fire({
                  icon: 'warning',
                  title: '¡Usuario en uso!',
                  text: 'No se ha podido crear el usuario ya que éste está en uso.'
                });
              }
            },
            error:function(){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Error en el código.'
              });
            }
          })
        }
      },guardarTarea:function(){
        var self=this;
        $.ajax({
          type:"POST",
          url:"administracion/nuevaTarea",
          data:{
            atareado:self.atareado,
            textotarea:self.textotarea,
            prioridad:self.prioridad
          },
          datatype:"Json",
          success: function(msg){
            msg = msg.slice(msg.indexOf('{"'), msg.length);
            var jsonMsg;
            try{
              jsonMsg = JSON.parse(msg);
            }catch(err){
              console.log("Mensaje err: "+err);
            }
            if(jsonMsg === undefined){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Datos mal recibidos.'
              });
            }else if(jsonMsg === false){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'No se ha podido guardar la el objetivo.'
              });
            }else{
              Swal.fire({
                icon: 'success',
                title: '¡Hecho!',
                text: 'Objetivo guardada con éxito.'
              });
              self.atareado="";
              self.textotarea="";
              self.prioridad="";
            }
          },
          error:function(){
            Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: 'Error desconocido.'
            });
          }
        })
  
      },guardaCrm:function(){
        var self=this;
        if(self.errorTelefono == true){
          Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'Corrige los errores antes de enviar.'
          });
        }else{
          $.ajax({
            type:"POST",
            url:"administracion/nuevoCrm",
            data:{
              perfil:self.perfil,
              nombre:self.nombre,
              perro:self.perro,
              necesidades:self.necesidades,
              telefono:self.telefono,
              viene_de:self.viene_de,
              datos_relevantes:self.datos_relevantes
            },
            datatype:"Json",
            success: function(msg){
  
              msg = msg.slice(msg.indexOf('{"'), msg.length);
              var jsonMsg;
  
              try{
                jsonMsg = JSON.parse(msg);
              }catch(err){
                console.log("Mensaje err: "+err);
              }
              if(jsonMsg === undefined){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'Datos mal recibidos.'
                });
              }else if(jsonMsg === false){
                Swal.fire({
                  icon: 'error',
                  title: '¡Error!',
                  text: 'No se ha podido guardar el crm.'
                });
              }else{
                Swal.fire({
                  icon: 'success',
                  title: '¡Hecho!',
                  text: 'Nuevo CRM guardado con éxito.'
                });
                self.perfil="",
                self.nombre="",
                self.perro="",
                self.necesidades="",
                self.telefono="",
                self.viene_de="",
                self.datos_relevantes="",
                self.changePanel('crm');
              }
            },
            error:function(){
              Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Error desconocido.'
              });
            }
          })
        }
  
      }
  
    },
    template:`
    <div>
        <ul class="list-admin">
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('usuario')">Nuevo usuario</button></li>
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('tarea')">Nueva objetivo</button></li>
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('crm')">Nuevo CRM</button></li>
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('cita')">Nueva cita</button></li>
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('modusuarios')">Ver/Modificar usuarios</button></li>
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('modtareas')">Ver/Modificar objetivos</button></li>
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('modcrm')">Ver/Modificar CRM</button></li>
          <li class="list-admin-item"><button type="button" class="btn btn-info" v-on:click="changePanel('modcitas')">Ver/Eliminar citas</button></li>
        </ul>
  
      <div class="paneles-admin">
      <div v-if="selected == 'modusuarios'">
        <div v-if="editUsuario == false">
          <div>
            <label for="buscadorTareas">Introduce filtro:</label>
            <p>Es posible filtrar por usuario y fecha de creación.</p>
            <p>Para la fecha utiliza el formato "XXXX-XX-XX"</p>
            <input type="text" id="buscadorTareas" v-model="aBuscar" name="buscadorTareas">
            <button type="button" v-on:click="buscar">Filtrar</button>
          </div>
          <div>
            <label for="checkFinalizados">Mostrar finalizados</label>
            <input type="checkbox" id="checkFinalizados" v-model="mostrarFinalizadas">
          </div>
        <div>
          <label for="resultados">Resultados por página:</label>
          <select name="resultados" id="resultados" v-model="numResults">
            <option value="8">8</option>
            <option value="16">16</option>
            <option value="30">30</option>
          </select>
        </div>
        <div class="isFlex flexWrap" >
          <button type="button" v-if="busquedaActiva" class="btn btn-danger" v-on:click="quitarFiltros">Quitar filtros</p></button>
          <div v-for="item in this.filtrosBusqueda" class="isButton  isFlex hasMarginSm">
  
            <p class="filtro">{{item}}</p>
          </div>
        </div>
        <table id="table" class="table table-bordered nowrap">
          <thead>
            <tr>
              <th scope="col" class="text-center">Usuario</th>
              <th scope="col" class="text-center">ID del usuario</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Tipo de usuario</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              <tr class="text-center" v-for="(item, index) in usuariosMod" v-show="(pag - 1) * numResults <= index  && pag * numResults > index">
                <th scope="row">{{item.username}}</th>
                  <td>{{item.id_usuario}}</td>
                  <td>{{item.e_mail}}</td>
                  <td>{{item.grupo}}</td>
                    <td>
                      <button type="button" class="btn btn-info" v-on:click="editarUsuario(item.username, item.id_usuario, item.e_mail, item.grupo)">Editar</button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger" @click="eliminarUsuario(item.id_usuario)">[X]</button>
                    </td>
              </tr>
            </tbody>
  
            <nav aria-label="Page navigation" class="text-center">
                <ul class="pagination text-center">
                    <li>
                        <a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                            <span aria-hidden="true">Anterior</span>
                          </a>
                      </li>
                    <li>
                        <a href="#" aria-label="Next" v-show="pag * numResults / tareas.length < 1" @click.prevent="pag += 1">
                            <span aria-hidden="true">Siguiente</span>
                          </a>
                      </li>
                  </ul>
              </nav>
          </table>
        </div>
        <div v-if="editUsuario == true">
        <table id="table" class="table table-bordered nowrap">
          <thead>
            <tr>
              <th scope="col" class="text-center">Usuario</th>
              <th scope="col" class="text-center">ID del usuario</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Tipo de usuario</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              <tr class="text-center">
                  <th scope="row"><input type="text" v-model="edit_usuario"></th>
                  <td>{{this.edit_id_usuario}}</td>
                  <td><input type="text" v-model="edit_email"></td>
                  <td>
                   {{this.edit_tipo_usuario}}
                  </td>
                    <td>
                      <button type="button" class="btn btn-success" v-on:click="guardarEditUsuario()">Confirmar</button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-warning" @click="editarUsuario()">Atrás</button>
                    </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div v-if="selected=='usuario'">
        <h1 class="text-center">Crear un nuevo usuario</h1>
          <form method="POST" action="#" v-on:submit.prevent="comprueba" class="form-center">
          <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" v-model="usuario" v-on:change="checkUsuario" class="form-control" required>
            <p class="form-error" v-if="errorUsuario">*El usuario no puede tener menos de 3 carácteres.</p>
          </div>
          <div class="form-group">
            <label for="pass">Contraseña:</label>
            <input type="password" id="pass" name="pass" v-model="pass" v-on:change="checkPass" class="form-control" required>
            <p class="form-error" v-if="errorPass">*La contraseña no puede tener menos de 6 carácteres.</p>
          </div>
          <div class="form-group">
            <label for="pass2">Confirma la contraseña:</label>
            <input type="password" id="pass2" name="pass2" v-model="pass2" v-on:change="checkPass2" class="form-control" required>
            <p class="form-error" v-if="errorPass2">*Las contraseñas no coinciden.</p>
            </div>
          <div class="form-group">
            <label for="email">Correo:</label>
            <input type="text" id="email" name="email" v-model="correo" v-on:change="checkCorreo" class="form-control" required>
            <p class="form-error" v-if="errorCorreo">*El correo electrónico no es válido.</p>
          </div>
          <div class="form-group">
            <label for="tipousuario">Tipo de usuario</label>
            <select name="tipousuario" id="tipousuario" v-model="tipoUsuario" class="form-control-lg">
              <option value="cliente">Cliente</option>
              <option value="admin">Administrador</option>
              <option value="adiestrador">Adiestrador</option>
            </select>
            </div>
            <div class="form-group">
              <input type="submit" value="Registrar" class="btn btn-success">
            </div>
        </form>
      </div>
      <div v-else-if="selected=='tarea'">
        <h1 class="text-center">Crear un nuevo objetivo</h1>
        <form action="#" method="POST" class="form-center">
        <div class="form-group">
          <select name="atareado" id="atareado" v-model="atareado" class="form-control form-control-lg" >
            <option v-for="item in usuarios" v-bind:value="item.id_usuario">{{item.username}}</option>
          </select>
        </div>
        <div class="form-group" v-if="this.atareado != '' ">
        <div class="form-group">
          <textarea cols="20" rows="5" v-model="textotarea" placeholder="texto..." class="form-control"></textarea>
        </div>
        <div class="form-group">
          <select name="prioridad" id="prioridad" v-model="prioridad" class="form-control form-control-lg">
            <option value="baja">Baja</option>
            <option value="intermedia">Intermedia</option>
            <option value="alta">Alta</option>
          </select>
        </div>
        <div class="form-group">
          <button type="button" v-on:click="guardarTarea" class="btn btn-success">Guardar objetivo</button>
        </div>
      </div>
  
        </form>
      </div>
  
      <div v-else-if="selected=='crm' && usuarios!='' ">
      <h1 class="text-center">Nuevo CRM</h1>
        <form method="POST" action="#" v-on:submit.prevent="guardaCrm" class="form-center margin-bottom-l" >
        <div class="form-group">
          <select name="perfil" id="perfil" v-model="perfil" class="form-control form-control-lg">
            <option v-for="item in usuarios" v-bind:value="item.id_usuario">{{item.username}}</option>
          </select>
        </div>
        <div v-if="perfil != '' ">
          <div class="form-group">
            <label for="nombre">Nombre del cliente:</label>
            <input type="text" id="nombre" name="nombre" v-model="nombre" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="perro">Nombre y raza del perro:</label>
            <input type="text" id="perro" name="perro" v-model="perro" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="necesidades">Necesidades del cliente:</label>
            <input type="text" id="necesidades" name="necesidades" v-model="necesidades" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" v-model="telefono" v-on:change="checkTelefono" class="form-control" required>
            <p class="form-error" v-if="errorTelefono">*El teléfono no es válido.</p>
          </div>
          <div class="form-group">
            <label for="viene_de">¿Cómo nos conoció?:</label>
              <select name="viene_de" id="viene_de" v-model="viene_de" class="form-control form-control-lg">
                <option value="redes">Redes</option>
                <option value="colaboracion">Colaboraciones</option>
                <option value="amigos">Amigos/conocidos</option>
                </select>
            </div>
          <div class="form-group">
            <label for="datos">Otros datos relevantes:</label>
            <textarea id="datos_relevantes" name="datos_relevantes" v-model="datos_relevantes" cols="20" rows="6" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Guardar CRM" class="btn btn-success">
          </div>
        </div>
        </form>
      </div>
  
      <div v-else-if="this.selected == 'modtareas'">
        <div v-if="editTarea==false">
          <div>
            <label for="buscadorTareas">Introduce filtro:</label>
            <p>Es posible filtrar por usuario y fecha de creación.</p>
            <p>Para la fecha utiliza el formato "XXXX-XX-XX"</p>
            <input type="text" id="buscadorTareas" v-model="aBuscar" name="buscadorTareas">
            <button type="button" v-on:click="buscar">Filtrar</button>
          </div>
          <div>
            <label for="checkFinalizados">Mostrar finalizados</label>
            <input type="checkbox" id="checkFinalizados" v-model="mostrarFinalizadas">
          </div>
        <div>
          <label for="resultados">Resultados por página:</label>
          <select name="resultados" id="resultados" v-model="numResults">
            <option value="8">8</option>
            <option value="16">16</option>
            <option value="30">30</option>
          </select>
        </div>
        <div class="isFlex flexWrap" >
          <button type="button" v-if="busquedaActiva" class="btn btn-danger" v-on:click="quitarFiltros">Quitar filtros</p></button>
          <div v-for="item in this.filtrosBusqueda" class="isButton  isFlex hasMarginSm">
  
            <p class="filtro">{{item}}</p>
          </div>
        </div>
        <table id="table" class="table table-bordered nowrap">
          <thead>
            <tr>
              <th scope="col" class="text-center">Usuario</th>
              <th scope="col" class="text-center">Objetivo</th>
              <th scope="col" class="text-center">Fecha objetivo</th>
              <th scope="col" class="text-center">Fecha completada</th>
              <th scope="col" class="text-center">Prioridad</th>
              <th scope="col" class="text-center">Creada por</th>
              <th scope="col" class="text-center">Comentario</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              <tr class="text-center" v-for="(item, index) in tareas" v-show="(pag - 1) * numResults <= index  && pag * numResults > index" :class="item.fecha_completada && tareaFin" v-if="item.terminada && mostrarFinalizadas || item.terminada==0">
                <th scope="row">{{item.id_usuario}}-{{item.username}}</th>
                  <td>{{item.tarea}}</td>
                  <td>{{item.fecha_tarea}}</td>
                  <td>{{item.fecha_completada}}</td>
                  <td v-if="item.prioridad == 0">Baja</td>
                  <td v-if="item.prioridad == 1">Intermedia</td>
                  <td v-if="item.prioridad == 2">Alta</td>
                  <td> {{item.creada_por}}-{{item.creada_por_usu}}</td>
                  <td>{{item.comentario}}</td>
                    <td v-if="item.terminada">
                    </td>
                    <td v-if="item.terminada">
                    </td>
                    <td v-if="item.terminada == 0">
                      <button type="button" class="btn btn-info" v-on:click="editarTarea(item.id_usuario, item.username, item.tarea, item.fecha_tarea, item.fecha_completada, item.prioridad, item.creada_por, item.creada_por_usu, item.comentario, item.id_tarea)">Editar</button>
                    </td>
                    <td v-if="item.terminada == 0">
                      <button type="button" class="btn btn-danger" @click="eliminarTarea(item.id_usuario, item.username, item.id_tarea)">[X]</button>
                    </td>
              </tr>
            </tbody>
  
            <nav aria-label="Page navigation" class="text-center">
                <ul class="pagination text-center">
                    <li>
                        <a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                            <span aria-hidden="true">Anterior</span>
                          </a>
                      </li>
                    <li>
                        <a href="#" aria-label="Next" v-show="pag * numResults / tareas.length < 1" @click.prevent="pag += 1">
                            <span aria-hidden="true">Siguiente</span>
                          </a>
                      </li>
                  </ul>
              </nav>
          </table>
      </div>
      <div v-if="editTarea == true">
      <table id="table" class="table table-bordered nowrap">
        <thead>
          <tr>
            <th scope="col" class="text-center">Usuario</th>
            <th scope="col" class="text-center">Fecha objetivo</th>
            <th scope="col" class="text-center">Fecha completada</th>
            <th scope="col" class="text-center">Objetivo</th>
            <th scope="col" class="text-center">Prioridad</th>
            <th scope="col" class="text-center">Creada por</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
  
         <tbody>
            <tr class="text-center">
              <th scope="row">{{this.edit_id_usuario}}-{{this.edit_username}}</th>
              <td>{{this.edit_fecha_tarea}}</td>
              <td>{{this.edit_fecha_completada}}</td>
              <td><textarea v-model="this.edit_tarea"></textarea></td>
              <td>
                <select v-model="this.edit_prioridad">
                  <option value="0">Baja</option>
                  <option value="1">Intermedia</option>
                  <option value="2">Alta</option>
                </select>
              </td>
              <td>{{this.edit_creada_por}}-{{this.edit_creada_por_usu}}</td>
              <td>
                <button type="button" class="btn btn-success" v-on:click="confirmarTarea">Confirmar</button>
              </td>
              <td>
                <button type="button" class="btn btn-warning" v-on:click="editarTarea">Atrás</button>
              </td>
            </tr>
         </tbody>
       </table>
       </div>
  
      </div>
      <div v-if="selected == 'modcrm'">
        <div v-if="editCrm == false">
        <div v-if="showInteracciones == false">
          <div>
            <label for="buscadorCrms">Introduce filtro:</label>
            <p>Es posible filtrar por nombre del cliente y usuario.</p>
            <input type="text" id="buscadorCrms" v-model="aBuscarCrm" name="buscadorCrms">
            <button type="button" v-on:click="buscarCrm">Filtrar</button>
          </div>
  
          <div>
            <label for="resultados">Resultados por página:</label>
            <select name="resultados" id="resultados" v-model="numResults">
              <option value="8">8</option>
              <option value="16">16</option>
              <option value="30">30</option>
            </select>
          </div>
  
          <div class="isFlex flexWrap" >
            <button type="button" v-if="busquedaActiva" class="btn btn-danger" v-on:click="quitarFiltros">Quitar filtros</p></button>
            <div v-for="item in this.filtrosBusqueda" class="isButton  isFlex hasMarginSm">
  
              <p class="filtro">{{item}}</p>
            </div>
          </div>
  
          <table id="table" class="table table-bordered nowrap">
          <thead>
            <tr>
              <th scope="col" class="text-center">Nombre cliente</th>
              <th scope="col" class="text-center">Usuario</th>
              <th scope="col" class="text-center">Perro</th>
              <th scope="col" class="text-center">Necesidades</th>
              <th scope="col" class="text-center">¿Cómo nos conoció?</th>
              <th scope="col" class="text-center">Teléfono</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Datos relevantes</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
           <tbody>
              <tr class="text-center" v-for="(item, index) in crms" v-show="(pag - 1) * numResults <= index  && pag * numResults > index">
                <th scope="row">{{item.id_cliente}}-{{item.nombre_cliente}}</th>
                <td>{{item.id_usuario}}-{{item.username}}</td>
                <td>{{item.perro}}</td>
                <td>{{item.necesidades}}</td>
                <td>{{item.viene_de}}</td>
                <td>{{item.telefono}}</td>
                <td>{{item.e_mail}}</td>
                <td>{{item.datos_relevantes}}</td>
                <td>
                  <button type="button" class="btn btn-info" v-on:click="modificarCrm(item.id_usuario,item.username,item.nombre_cliente,item.perro,item.necesidades,item.viene_de,item.telefono,item.e_mail,item.datos_relevantes)">Modificar</button>
                </td>
                <td>
                  <button type="button" class="btn btn-info" v-on:click="mostrarInteracciones(item.id_cliente, item.username)">Interacciones</button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger" v-on:click="eliminarCrm(item.id_cliente, item.nombre_cliente)">[X]</button>
                </td>
              </tr>
           </tbody>
  
               <nav aria-label="Page navigation" class="text-center">
                  <ul class="pagination text-center">
                      <li>
                          <a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                              <span>Anterior</span>
                          </a>
                      </li>
                      <li>
                          <a href="#" aria-label="Next" v-show="pag * numResults / crms.length < 1" @click.prevent="pag += 1">
                              <span>Siguiente</span>
                          </a>
                      </li>
                  </ul>
              </nav>
  
           </table>
           </div>
           <div v-if="showInteracciones">
           <!--DIV PARA LAS INTERACCIONES-->
            <div>
              <h2>Interacciones del cliente {{userInteracciones}} </h2>
           </div>
           <div>
            <button type="button" class="btn btn-primary" v-on:click="nuevaInteraccion">Nueva interacción[+]</button>
                <table id="table" class="table  table-bordered nowrap" v-if="interaccion == false">
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">Fecha interacción</th>
                      <th scope="col" class="text-center">Mensaje</th>
                      <th scope="col" class="text-center">Interactuado por</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in interacciones">
                      <td scope="row" class="text-center">{{item.fecha_interaccion}}</td>
                      <td class="text-center">{{item.mensaje}}</td>
                      <td class="text-center">{{item.interactuado_por}}</td>
                      <td class="text-center"><button type="button" class="btn btn-danger" v-on:click="eliminarInteraccion(item.id_interaccion)">[X]</button></td>
                    </tr>
                  </tbody>
                </table>
                <div v-if="interaccion">
                  <label for="textareaInteraccion">Escribe aquí el resumen de la interacción:</label>
                  <textarea v-model="interaccion_mensaje" id="textareaInteraccion"></textarea>
                  <button type="button" class="btn btn-success" v-on:click="guardarInteraccion">Guardar</button>
                  <button type="button" class="btn btn-warning" v-on:click="nuevaInteraccion">Atrás</button>
                </div>
           </div>
           <div>
            <button type="button" class="btn btn-warning" v-on:click="mostrarInteracciones">Atrás</button>
           </div>
           </div>
        </div>
  
        <div v-else>
          <!--EDITAR CRM-->
          <table id="table" class="table table-bordered nowrap">
          <thead>
            <tr>
              <th scope="col" class="text-center">Usuario</th>
              <th scope="col" class="text-center">Nombre cliente</th>
              <th scope="col" class="text-center">Perro</th>
              <th scope="col" class="text-center">Necesidades</th>
              <th scope="col" class="text-center">¿Cómo nos conoció?</th>
              <th scope="col" class="text-center">Teléfono</th>
              <th scope="col" class="text-center">Email</th>
              <th scope="col" class="text-center">Datos relevantes</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
           <tbody>
              <tr class="text-center">
                <th scope="row">{{this.edit_id_user_crm}}-{{this.edit_user_crm}}</th>
                <td>{{this.edit_nombre_cliente_crm}}</td>
                <td>{{this.edit_perro_crm}}</td>
                <td><textarea cols="12" rows="2" v-model="edit_necesidades_crm"></textarea></td>
                <td>{{this.edit_viene_de_crm}}</td>
                <td><input type="text" v-model="edit_telefono_crm"></td>
                <td><input type="text" v-model="edit_email_crm"></td>
                <td><textarea cols="12" rows="2" v-model="edit_datos_relevantes_crm"></textarea></td>
                <td>
                  <button type="button" class="btn btn-success" v-on:click="confirmarCrm">Confirmar</button>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" v-on:click="modificarCrm">Atrás</button>
                </td>
              </tr>
           </tbody>
           </table>
        </div>
  
      </div>
        <div v-if="selected == 'cita'">
        <!--volver-->
        <form class="margin-bottom-l form-center">
        <div class="form-group">
        <label for="selectAdiestrador">Selecciona un adiestrador: </label>
          <select name="selectAdiestrador" id="selectAdiestrador" v-model="cita.adiestrador" class="form-control form-control-lg" >
            <option v-for="item in adiestradores" v-bind:value="item.id_empleado">{{item.nombre}}</option>
          </select>
        </div>
        <div class="form-group">
        <label for="selectCliente">Selecciona un cliente: </label>
          <select name="selectCliente" id="selectCliente" v-model="cita.cliente" class="form-control form-control-lg" >
            <option v-for="item in clientes" v-bind:value="item.id_cliente">{{item.nombre_cliente}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="selectFecha">Selecciona una fecha: </label>
          <vuejs-datepicker :bootstrap-styling="true" :format="'dd-MM-yyyy'" v-model="cita.fecha" :language="es" :monday-first="true"></vuejs-datepicker>
          <label for="selectFecha">Selecciona una hora: </label><br>
          <input type="time" v-model="citaHora">
        </div>
        <div class="form-group">
          <label for="titulo">Titulo:</label>
          <input type="text" name="titulo" id="titulo" v-model="cita.titulo" class="form-control">
        </div>
        <div class="form-group">
          <label for="poblacion">Poblacion:</label>
          <input type="text" name="poblacion" id="poblacion" v-model="cita.poblacion" class="form-control">
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje:</label>
          <textarea id="mensaje" name="mensaje" v-model="cita.mensaje" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <button type="button" v-on:click="nuevaCita" class="btn btn-success">Guardar cita</button>
        </div>
        </form>
      </div>
  
  
        <div v-if="selected == 'modcitas'">
          <div>
            <label for="buscadorTareas">Introduce filtro:</label>
            <p>Es posible filtrar por nombre de cliente, nombre de empleado y fecha de cita.</p>
            <p>Para la fecha utiliza el formato "XXXX-XX-XX"</p>
            <input type="text" id="buscadorCitas" v-model="aBuscarCita" name="buscadorCitas">
            <button type="button" v-on:click="buscarCita">Filtrar</button>
          </div>
          <div>
            <label for="checkFinalizados">Mostrar finalizados</label>
            <input type="checkbox" id="checkFinalizados" v-model="mostrarFinalizadas">
          </div>
        <div>
          <label for="resultados">Resultados por página:</label>
          <select name="resultados" id="resultados" v-model="numResults">
            <option value="8">8</option>
            <option value="16">16</option>
            <option value="30">30</option>
          </select>
        </div>
        <div class="isFlex flexWrap" >
          <button type="button" v-if="busquedaActiva" class="btn btn-danger" v-on:click="quitarFiltros">Quitar filtros</p></button>
          <div v-for="item in this.filtrosBusqueda" class="isButton  isFlex hasMarginSm">
  
            <p class="filtro">{{item}}</p>
          </div>
        </div>
        <table id="table" class="table table-bordered nowrap">
        <thead>
          <tr>
            <th scope="col" class="text-center">Cliente</th>
            <th scope="col" class="text-center">Empleado</th>
            <th scope="col" class="text-center">Fecha</th>
            <th scope="col" class="text-center">Población</th>
            <th scope="col" class="text-center">Título de la cita</th>
            <th scope="col" class="text-center">Mensaje de la cita</th>
            <th></th>
  
          </tr>
        </thead>
         <tbody>
            <tr class="text-center" v-for="(item, index) in citas" v-show="(pag - 1) * numResults <= index  && pag * numResults > index">
              <th scope="row">{{item.id_cliente}}-{{item.nombre_cliente}}</th>
              <td>{{item.id_empleado}}-{{item.nombre}}</td>
              <td>{{item.start}}</td>
              <td>{{item.poblacion}}</td>
              <td>{{item.title}}</td>
              <td>{{item.mensaje}}</td>
              <td>
                <button type="button" class="btn btn-danger" v-on:click="eliminarCita(item.id)">Eliminar</button>
              </td>
            </tr>
         </tbody>
  
             <nav aria-label="Page navigation" class="text-center">
                <ul class="pagination text-center">
                    <li>
                        <a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
                            <span>Anterior</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" aria-label="Next" v-show="pag * numResults / crms.length < 1" @click.prevent="pag += 1">
                            <span>Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>
  
         </table>
  
      </div>
    </div>
    </div>
    </div>
  </div>
  
      `
  }
  
  var app_admin = new Vue({
    el:'#app-admin',
    components:{
      'admin-panel': adminPanel
    }
  
  });
  