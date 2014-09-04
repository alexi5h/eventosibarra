$(function() {
    $('div.is-superadmin-note').remove();
    $('.tree-toggle').click(function() {
        $(this).parent().children('ul.tree').toggle(200);
    });
});


