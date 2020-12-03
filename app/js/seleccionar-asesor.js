let modal = document.querySelector(".modal");
let modalTitle = document.querySelector(".modal-title");
let btnAgendar = document.querySelector(".btn-agendar");
let btnConfirmar = document.querySelector(".btnConfirmarAsesoria");
let nombreAsesor = document.querySelector("#txtNombreAsesor");
let IDAsesor = document.querySelector("#txtIDAsesor");

asignardatos = (asesor, id)=>
{
    modalTitle.innerHTML = `Asesoría con ${asesor}`;  
    nombreAsesor.value = asesor;
    IDAsesor.value = parseInt(id);
    IDAsesor.hidden = true;
}

btnConfirmar.addEventListener("click", ()=>{
    // Swal.fire(
    //     'Asesoría guardada',
    //     'Se lo haremos saber a tu asesor.',
    //     'success'
    // );
    //$('.modal').modal('hide');
});

(function()
{
    'use strict';
    window.addEventListener('load', function()
    {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      let forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      let validation = Array.prototype.filter.call(forms, function(form)
      {
        form.addEventListener('submit', function(event)
        {
          if (form.checkValidity() === false)
          {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();