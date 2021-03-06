$(document).ready(function(){
    $("li.active").removeClass("active");
    $("#menuAgenda").addClass("active");

    let idTabla="#tabla-agenda";
    $("#tabla-agenda").DataTable({
        "fnRowCallback": function (nRow, data, iDisplayIndex) {
            if(data[5]=='Completada'){
                $('td', nRow).addClass('table-success');
                // $('td:eq(4)', nRow).text("SI");
            }
            else
            {
                $('td', nRow).addClass('table-warning');
                // $('td:eq(4)', nRow).text("NO");
            }
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
                $(this).html('<input type="text" class="filtro form-control input-sm" style="width:90%;" placeholder="Buscar'+ title + '" />');
            });
            
            //Quitar filtro en la ultima columna (la de operaciones)
            $(fila).children("th:last").html('');
            
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
        'aoColumnDefs': [
                        {'targets': [2,3], 'className': 'text-right'},
                        {'targets': 4, 'className': 'text-center'}
        ],
        'order': [[1, 'asc'],[0, 'asc']],
        'language': {'url':'http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'}
    });   
});
    