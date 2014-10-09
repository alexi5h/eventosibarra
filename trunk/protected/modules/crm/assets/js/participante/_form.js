$(function () {
    $("#Participante_sector_id").change(function () {
        AjaxListaSubsectores("Participante_sector_id", "Participante_subsector_id");
    });
    $("#Participante_subsector_id").change(function () {
        AjaxListaRamaActividades("Participante_subsector_id", "Participante_rama_actividad_id");
    });
    $("#Participante_rama_actividad_id").change(function () {
        AjaxListaActividades("Participante_rama_actividad_id", "Participante_actividad_id");

    });
    $('#Participante_sector_id > option[value="1"]').html('Primario - (Actividades relacionadas con recursos de la naturaleza)');
    $('#Participante_sector_id > option[value="2"]').html('Secundario - (Actividades relacionadas con transformación de materia prima)');
    $('#Participante_sector_id > option[value="3"]').html('Terciario - (Actividades que ofrecen servicios a las personas)');
    $('#Participante_sector_id > option[value="4"]').html('Cuaternario - (Actividades relacionadas con investigación)');
    maskAttributes();
});

function maskAttributes() {
    $('#Participante_cedula').mask('0000000000');
    $('#Participante_telefono').mask('000000000');
    $('#Participante_celular').mask('0000000000');
    $('#Participante_nombres').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA' ,{translation: {'A': {pattern: /[A-Z Ñ]/, optional: true}}, placeholder: 'Nombres (solo mayúsculas)'});
    $('#Participante_apellidos').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA' ,{translation: {'A': {pattern: /[A-Z Ñ]/, optional: true}}, placeholder: 'Apellidos (solo mayúsculas)'});
    //continuar cargando formatos para input
}

function AjaxListaSubsectores(lista, lista_actualizar)
{
    $('#s2id_' + lista_actualizar + ' a span').html('');
    AjaxCargarListas(baseUrl + "crm/subsector/ajaxGetSubsectorBySector",
            {sector_id: $("#" + lista).val()}, function (data) {
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
            {subsector_id: $("#" + lista).val()}, function (data) {
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
            {rama_actividad_id: $("#" + lista).val()}, function (data) {
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
        success: function (data) {
            callBack(data);
        }
    });
}