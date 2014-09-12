var selected = null;
$(function() {
    $(".form-group").hover(
            function() {
                selected = $(this).find("div").attr('id');
                $("#" + selected).attr({
                    'data-toogle': 'tooltip',
                });
                $("#" + selected).tooltip('show');
            },
            function() {
                selected = $(this).find("div").attr('id');
                $("#" + selected).tooltip('hide');
            }
    );
    $('#Reporte_evento_id').attr({
        'title': 'Filtrar por Evento',
    });
    $('#Reporte_sector_id').attr({
        'title': 'Filtrar por Sector',
    });
    $('#Reporte_subsector_id').attr({
        'title': 'Filtrar por Subsector',
    });
    $('#Reporte_rama_actividad_id').attr({
        'title': 'Filtrar por Rama de Actividad',
    });
    $('#Reporte_actividad_id').attr({
        'title': 'Filtrar por Actividad',
    });
});
function update() {
//    console.log($('#reporte-form').serializeArray());

    $.fn.yiiGridView.update('reporte-grid', {
        data: $('#reporte-form').serialize(),
    });
}