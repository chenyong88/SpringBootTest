$(document).ready(function()
{
    $('a.mode-toggle').click(function()
    {
        $('a.mode-toggle').removeClass('active');
        $(this).addClass('active');
        $('a.mode-toggle').parent('div').nextAll('#cardMode, #listMode').hide();
        $('#' + $(this).data('mode') + 'Mode').show();
        $.cookie('fieldViewType', $(this).data('mode'), {path: "/"});
        fixTableHeader();
    })

    var type = $.cookie('fieldViewType');
    if(typeof(type) == 'undefined' || type == '') type = 'list';
    $('#menuActions a[data-mode=' + type +']').click();
});
