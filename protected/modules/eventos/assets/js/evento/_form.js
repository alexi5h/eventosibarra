$(function(){
    maskAttributes();
});
function maskAttributes() {
    $('#Evento_fecha_inicio').mask('00/00/0000', {clearIfNotMatch: true, placeholder: "__/__/____"});
    $('#Evento_fecha_fin').mask('00/00/0000', {clearIfNotMatch: true, placeholder: "__/__/____"});
    //continuar cargando formatos para input
}