$(function() {
    $("#Actividad_sector_id").change(function() {
        AjaxListaSubsectores("Actividad_sector_id", "Actividad_subsector_id");
    });
    $("#Actividad_subsector_id").change(function() {
        AjaxListaRamaActividades("Actividad_subsector_id", "Actividad_rama_actividad_id");
    });
});

function AjaxListaSubsectores(lista, lista_actualizar)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxCargarListas(baseUrl + "crm/subsector/ajaxGetSubsectorBySector",
            {sector_id: $("#" + lista).val()}, function(data) {
        $("#" + lista_actualizar).html(data);
        $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[id='p']").html());
        $('span.select2-arrow').html('<b role="presentation"></b>');
        $("option[id='p']").val(null);


    });
}

function AjaxListaRamaActividades(lista, lista_actualizar)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxCargarListas(baseUrl + "crm/ramaActividad/ajaxGetRamaActividadBySubsector",
            {subsector_id: $("#" + lista).val()}, function(data) {
        $("#" + lista_actualizar).html(data);
        $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[id='p']").html());
        $('span.select2-arrow').html('<b role="presentation"></b>');
        $("option[id='p']").val(null);


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