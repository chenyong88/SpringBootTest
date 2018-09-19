$(document).ready(function()
{
    $('#mainNavbar .nav > li').removeClass('active').find('a[href*=effor]').parent().addClass('active');
    $('#menu .nav > li').removeClass('active').find('a[href*=effor][href*=' + v.type + ']').parent().addClass('active');

    $('td.objectLink > a').click(function()
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
})
