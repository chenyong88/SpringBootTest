$(document).ready(function()
{
    if(v.from == 'company')
    {
        $('#mainNavbar .nav > li').removeClass('active').find('a[href*=company]').parent('li').addClass('active');
        $('#menu .nav > li').removeClass('active').find('a[href*=weekly]').parent('li').addClass('active');
    }
    else
    {
        $('#mainNavbar .nav > li').removeClass('active').find('a[href*=effort]').parent('li').addClass('active');
        $('#menu .nav > li').removeClass('active').find('a[href*=browseWeekly]').parent('li').addClass('active');
    }
})
