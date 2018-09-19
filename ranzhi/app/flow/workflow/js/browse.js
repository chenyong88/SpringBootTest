$(document).ready(function()
{
    if(config.requestType == 'GET')
    {
        $('#menu .nav li').removeClass('active').find('[href*=parent\\=' + v.parent + '\\&type\\=' + v.type + ']').parent().addClass('active');
    }
    else
    {
        $('#menu .nav li').removeClass('active').find('[href*=' + v.parent + '-' + v.type + ']').parent().addClass('active');
    }

    $('a.mode-toggle').click(function()
    {
        $('a.mode-toggle').removeClass('active');
        $(this).addClass('active');
        $('a.mode-toggle').parent('div').nextAll('div').hide();
        $('#' + $(this).data('mode') + 'Mode').show();
        $.cookie('flowViewType', $(this).data('mode'), {path: "/"});
        fixTableHeader();
    })

    var type = $.cookie('flowViewType');
    if(typeof(type) == 'undefined' || type == '') type = 'card';
    $('#menuActions a[data-mode=' + type +']').click();

    $(document).on('change', '#app', function()
    {
        if($(this).val()) $('select#positionModule').load(createLink('flow.workflow', 'ajaxGetMenus', 'app=' + $(this).val() + '&currentModule=' + v.currentModule));
    });

    $('.flow-toggle').click(function()
    {
        var obj = $(this).find('i');
        if(obj.hasClass('icon-plus'))
        {
            obj.parents('tr').next('tr').show();
            obj.removeClass('icon-plus').addClass('icon-minus');
        }
        else if(obj.hasClass('icon-minus'))
        {
            obj.parents('tr').next('tr').hide();
            obj.removeClass('icon-minus').addClass('icon-plus');
        }
        return false;
    });

});
