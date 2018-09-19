$(document).ready(function()
{
    $('#mainNavbar .nav > li').removeClass('active').find('a[href*=effort]').parent('li').addClass('active');
    $('#menu .nav > li').removeClass('active').find('a[href*=browseWeekly]').parent('li').addClass('active');

    $('#begin, #end').change(function()
    {
        var begin = $('#begin').val();
        var end   = $('#end').val();
        begin = begin.replace(/-/g, '');
        end   = end.replace(/-/g, '');
        return location.href = createLink('effort', 'createweekly', 'begin=' + begin + '&end=' + end);
    });
})
