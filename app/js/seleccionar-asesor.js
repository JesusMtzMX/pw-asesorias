let modal = document.querySelector(".modal");
let modalTitle = document.querySelector(".modal-title");
let btnAgendar = document.querySelector(".btn-agendar");
let btnConfirmar = document.querySelector(".btnConfirmarAsesoria");

asignardatos = (asesor)=>
{
    modalTitle.innerHTML = `Asesoría con ${asesor}`;    
}

btnConfirmar.addEventListener("click", ()=>{
    // Swal.fire(
    //     'Asesoría guardada',
    //     'Se lo haremos saber a tu asesor.',
    //     'success'
    // );
    //$('.modal').modal('hide');
});

$(document).ready(function(){
  //$("li.active").removeClass("active");
  //$("#mnuProductos").addClass("active");

  $('#frmAsesoria').bootstrapValidator({
      fields: {
        txtIDAsesorado:{
              validators:{
                  notEmpty: {
                      message: 'El nombre del solicitante (asesorado) es obligatorio'
                  },
                  stringLength: {
                      message: 'Debe tener entre 10 y 40 caracteres',
                      min:10,
                      max:40,
                      trim: true
                  }
              }
          },
          txtTemaAsesoria:{
              validators:{
                  notEmpty: {
                      message: 'El tema es un dato requerido'
                  },
                  stringLength: {
                    message: 'Especifica el tema con un mínimo de 4 carácteres',
                    min:4,
                    max:40,
                    trim: true
                }
              }
          },
          txtAreaEstudio:{
              validators:{
                  notEmpty: {
                      message: 'El área o ámbito es un dato requerido'
                  },
                  stringLength: {
                    message: 'Especifica el área o ámbito con un mínimo de 4 carácteres',
                    min:4,
                    max:40,
                    trim: true
                }
              }
          },
          inpFecha:{
            validators:{
                notEmpty: {
                    message: 'Especifica la fecha de la asesoría'
                }                
            }
          },
          inpHora:{
            validators:{
                notEmpty: {
                    message: 'Especifica la hora de la asesoría'
                },                
            }
          }

      } //Fields
  }); //Validator
}); //ready