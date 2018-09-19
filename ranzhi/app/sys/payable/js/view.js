$(function()
{
    if(config.requestType == 'GET')
    {
        $('#menu .nav li').removeClass('active').find('[href*=f\\\=' + v.mode + ']').parent().addClass('active');
    }
    else
    {
        $('#menu .nav li').removeClass('active').find('[href*=payable-' + v.mode + ']').parent().addClass('active');
    }

    $(document).on('click', 'a', function()
    {
        if($(this).hasClass('notOpenEntry')) return false;

        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/crm/') != -1) app = 'crm';
        if(href.indexOf('/psi/') != -1) app = 'psi';

        if(app != '')
        {
            $.openEntry(app, href);
            return false;
        }
    });
})
