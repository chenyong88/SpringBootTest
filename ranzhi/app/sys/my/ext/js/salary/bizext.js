$(document).ready(function()
{
    if(v.viewable)
    {
        $(window).on('blur', function(){location.reload();});

        setTimeout(function(){location.reload();}, 10 * 60 * 1000);
    }

    if(!$('li.dept').closest('#menu').length)
    {
        $('#menu > ul:first > li:last').after($('li.dept'));
        $('#menu > ul:first > li:last').after($('li.password'));
    }

    $('#menu .nav>li').removeClass('active').find('a[href*=' + v.type + ']').parent('li').addClass('active');

    /* expand active tree. */
    $('.tree li.active .hitarea').click();

    /* process actions. */
    $('.actions').click(function()
    {
        var skip = false;
        if($(this).data('toggle') == 'modal') skip = true;
        if($(this).hasClass('deleter')) skip = true;
        if($(this).hasClass('reloadDeleter')) skip = true;
        if($(this).hasClass('switcher')) skip = true;

        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/hr/') != -1)  app = 'hr';

        if(!skip && app != '')
        {
            $.openEntry(app, href);
            return false;
        }
    });
});
