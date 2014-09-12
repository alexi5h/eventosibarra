$(function(){
    //$('#reporte-form').addClass('tooltips_select');
//    $('#Reporte_evento_id').attr({
//        'data-toogle':'tooltip',
//        'title':'Filtrar por Evento',
//    });
//    $('#Reporte_evento_id').tooltip('toogle');
//    
//    $('#Reporte_sector_id').attr({
//        'data-toogle':'tooltip',
//        'title':'Filtrar por Sector',
//    });
//    
//    $('#Reporte_subsector_id').attr({
//        'data-toogle':'tooltip',
//        'title':'Filtrar por Subsector',
//    });
//    $('#Reporte_subsector_id').tooltip('toogle');
//    
//    $('#Reporte_rama_actividad_id').attr({
//        'data-toogle':'tooltip',
//        'title':'Filtrar por Rama de Actividad',
//    });
//    $('#Reporte_rama_actividad_id').tooltip('toogle');
//    
//    $('#Reporte_actividad_id').attr({
//        'data-toogle':'tooltip',
//        'title':'Filtrar por Actividad',
//    });
//    $('#Reporte_actividad_id').tooltip('toogle');
});
function update() {
//    console.log($('#reporte-form').serializeArray());

    $.fn.yiiGridView.update('reporte-grid', {
        data:$('#reporte-form').serialize(),
    });
}