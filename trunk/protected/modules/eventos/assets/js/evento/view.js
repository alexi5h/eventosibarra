$(function() {
//    $('#btn-copy').tooltip('show');
    var clientText = new ZeroClipboard($("#btn-copy"));
    clientText.on("copy", function(event) {
        var clipboard = event.clipboardData;
        clipboard.setData("text/plain", $('#text_value').val());
    });

});
