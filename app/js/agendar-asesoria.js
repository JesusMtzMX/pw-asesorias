let btnAgendar = document.querySelector(".btn-agendar");
let btnAgendar = document.querySelector(".btn-repor");
let sesion = document.querySelector("#variable_sesion").value;

btnAgendar.addEventListener("click", ()=>{
    if(sesion === 'Asesorado')
    {    
            
        window.location="../app/agendar-asesoria.php";
    }
    else if(sesion === 'Asesor')
    {
        alert('Para obtener asesoría por parte de otros asesores, debes crear una cuenta de asesorado.');
    }
    else
    {
        window.location="../app/iniciar_sesion.php";
    }
});

$(document).ready(function(){
    $("li.active").removeClass("active");
    $("#navAsesores").addClass("active");

    let idTabla="#tablaAsesores";
    $("#tablaAsesores").DataTable({        
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
        'aoColumnDefs': [{ 'bSortable': false, 'aTargets': 0 }
                        // {'targets': [2,3], 'className': 'text-right'},
                        // {'targets': 4, 'className': 'text-center'}
        ],
        'order': [[1, 'asc']],
        'language': {'url':'http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'}
    });   
});
    
// function eliminar(clave,producto){
//     $("#producto").text(producto);
//     $("#btnAceptar").val(clave);
//     $("#mdlConfirmar").modal({
//         keyboard: false
//     });
// }