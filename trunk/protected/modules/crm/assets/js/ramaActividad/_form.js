$(function() {
//    RamaActividad_sector_id
    $("#RamaActividad_sector_id").change(function() {
        AjaxListaSubsectores("RamaActividad_sector_id", "RamaActividad_subsector_id");
    });
});

function AjaxListaSubsectores(lista, lista_actualizar)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxCargarListas(baseUrl + "crm/subsector/ajaxGetSubsectorBySector",
            {sector_id: $("#" + lista).val()}, function(data) {
        $("#" + lista_actualizar).html(data);
        $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[id='p']").html());
        $('span.select2-arrow').html('<b role="presentation"></b>')

    });
}
function AjaxCargarListas(url, data, callBack)
{
    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(data) {
            callBack(data);
        }
    });
}