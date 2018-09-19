$(document).ready(function()
{
    if(v.fromSetting) $('.icon-search').click();

    $('#dept').change(function()
    {
        $('#account').load(createLink('salary', 'ajaxGetDeptUsers', 'dept=' + $(this).val()), function()
        {
            $('#account').trigger('chosen:updated');
        });
    });

    /* Highlight submenu. */
    if(config.requestType == 'GET')
    {
        if(v.mode == 'bysearch') $('#menu .nav li').removeClass('active').find("[href*='=" + v.mode + "']").parent().addClass('active');
    }
    else
    {
        if(v.mode == 'bysearch') $('#menu .nav li').removeClass('active').find('[href*=' + v.mode + ']').parent().addClass('active');
    }

    fixTableHeader();
})
