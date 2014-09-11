
function update() {
//    console.log($('#reporte-form').serializeArray());

    $.fn.yiiGridView.update('reporte-grid', {
        data:$('#reporte-form').serialize(),
    });
}