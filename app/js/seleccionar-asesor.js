$(document).ready(function()
{

    let idTabla="#tblAgendar";
    $("#tblAgendar").DataTable({
        "fnRowCallback": function (nRow, data, iDisplayIndex) {
        },
        "fnInitComplete": function (oSettings, json) {
            /*Configuración de los filtros individuales*/
            var fila = $(this).children("thead").children("tr").clone();
            var pie = $("<tfoot/>").append(fila).css("display", "table-header-group");
            $(this).children("thead").after(pie);
            $(fila).children().each(function () {
                $(this).prop("class", null);
            });

            $(fila).children("th").each(function () {
                var title = $(this).text().toLowerCase();
                $(this).html('<input type="text" class="filtro form-control input-sm" style="width:90%;" placeholder="Buscar ' + title + '" />');
            });
            
            //Quitar filtro en la ultima columna (la de operaciones)
            $(fila).children("th:last").html('');

            $(fila).children("th:first").html('');
            
            let tabla = this;
            //Activa el filtrado
            tabla.api().columns().eq(0).each(function (colIdx) {
                $(idTabla + ' tfoot th:eq(' + colIdx + ') input').on('keyup change', function () {
                    tabla.api().column(colIdx).search(this.value).draw();
                });

                $('input', tabla.api().column(colIdx).footer()).on('click', function (e) {
                    e.stopPropagation();
                });
            });
        },
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': 0 },
                        { 'bSortable': false, 'aTargets': 3 },
        //                 {'targets': [2,3], 'className': 'text-right'},
        //                 {'targets': 4, 'className': 'text-center'}
        ],
        'order': [[1, 'asc'],[0, 'asc']],
        'language': {'url':'http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'}
    });

    let modalTitle = document.querySelector(".modal-title");

    let idAsesor = document.querySelector("#txtIDAsesor");

    asignardatos = (asesor, id)=>
    {
        modalTitle.innerHTML = `Asesoría con ${asesor} ${id}`;
        idAsesor.value = id;    
    }

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