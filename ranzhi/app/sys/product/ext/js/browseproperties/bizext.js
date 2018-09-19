$(document).ready(function()
{
    $('#menu .nav li').removeClass('active').find('a[href*=browseProperties]').parent().addClass('active');
    $('.side .nav li').removeClass('active').find('a[href*=' + v.section + ']').parent().addClass('active');
})
