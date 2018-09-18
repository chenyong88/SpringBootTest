$(function()
{
    $('.panel-history a').click(function()
    {
        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/crm/') != -1) app = 'crm';
        if(href.indexOf('/psi/') != -1) app = 'psi';

        if(app != '' && $(this).data('toggle') == undefined)
        {
            $.openEntry(app, href);
            return false;
        }
    });
})
