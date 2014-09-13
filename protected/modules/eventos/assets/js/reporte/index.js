var selected = null;
$(function() {
    $(".form-group").hover(
            function() {
                selected = $(this).find("div").attr('id');
                $("#" + selected).attr({
                    'data-toogle': 'tooltip',
                    'data-placement': 'bottom'
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
//    console.log($('#reporte-grid > table > tbody').find('td > span'));
//    spans=$('#reporte-grid > table > tbody').find('td > span');
    $('span.vacios').parent().attr({
        'style':'text-align:center',
    });
});
function update() {
//    console.log($('#reporte-form').serializeArray());

    $.fn.yiiGridView.update('reporte-grid', {
        data: $('#reporte-form').serialize(),
    });
}