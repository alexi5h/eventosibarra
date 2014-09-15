$(function() {
    maskAttributes();
});
function maskAttributes() {
//    $('#Evento_fecha_inicio').mask('00/00/0000', {clearIfNotMatch: true, placeholder: "__/__/____"});
    $('#Evento_fecha_inicio').mask('D0/M0/Y000', {translation: {
            D: {pattern: /[0-3]/},
            M: {pattern: /[0,1]/},
            Y: {pattern: /[1,2]/},
        }, clearIfNotMatch: true, placeholder:'dd/mm/yyyy'});
    $('#Evento_fecha_fin').mask('D0/M0/Y000', {translation: {
            D: {pattern: /[0-3]/},
            M: {pattern: /[0,1]/},
            Y: {pattern: /[1,2]/},
        }, clearIfNotMatch: true, placeholder:'dd/mm/yyyy'});
    //continuar cargando formatos para input
}