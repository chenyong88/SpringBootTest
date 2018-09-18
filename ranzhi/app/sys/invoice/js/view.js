$(function()
{ 
    $('.table-info a').click(function()
    {
        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/crm/')  != -1) app = 'crm';

        if(app != '')
        {
            $.openEntry(app, href);
            return false;
        }
    });
})
