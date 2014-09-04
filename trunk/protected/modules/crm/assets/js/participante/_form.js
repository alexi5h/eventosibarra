$(function() {
    $("#Participante_sector_id").change(function() {
        AjaxListaSubsectores("Participante_sector_id", "Participante_subsector_id");
    });
    $("#Participante_subsector_id").change(function() {
        AjaxListaRamaActividades("Participante_subsector_id", "Participante_rama_actividad_id");
    });
    $("#Participante_rama_actividad_id").change(function() {
        AjaxListaActividades("Participante_rama_actividad_id", "Participante_actividad_id");

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
    AjaxCargarListas(baseUrl + "crm/ramaActividad/ajaxGetRamaActiBySubSector",
            {subsector_id: $("#" + lista).val()}, function(data) {
        $("#" + lista_actualizar).html(data);
        $('#s2id_' + lista_actualizar + ' a span').html($("#" + lista_actualizar + " option[id='p']").html());
        $('span.select2-arrow').html('<b role="presentation"></b>');
        $("option[id='p']").val(null);

    });
}
function AjaxListaActividades(lista, lista_actualizar)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxCargarListas(baseUrl + "crm/actividad/ajaxGetActividadByRama",
            {rama_actividad_id: $("#" + lista).val()}, function(data) {
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