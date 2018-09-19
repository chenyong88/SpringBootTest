$(document).ready(function()
{
    $('#mainNavbar .nav > li').removeClass('active').find('a[href*=effort]').parent('li').addClass('active');
    $('#menu .nav > li').removeClass('active').find('a[href*=browseWeekly]').parent('li').addClass('active');
})
