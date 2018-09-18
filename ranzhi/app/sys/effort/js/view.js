$(document).ready(function()
{
    $.setAjaxLoader('#triggerModal .ajaxEdit', '#triggerModal');
    $.setAjaxLoader('#ajaxModal .ajaxEdit', '#ajaxModal');

    $('a.objectLink').click(function()
    {
        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/crm/') != -1) app = 'crm';
        if(href.indexOf('/oa/') != -1)  app = 'oa';

        if(app != '')
        {
            $.openEntry(app, href);
            return false;
        }
    });
});
