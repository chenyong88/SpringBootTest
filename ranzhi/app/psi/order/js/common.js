$(function()
{
    if(v.status) $('#menu .nav > li').removeClass('active').find('[href*=' + v.status + ']') .parent().addClass('active');

    $('a.contract').click(function()
    {
        var href = $(this).prop('href');
        var  app = 'crm';

        $.openEntry(app, href);
        return false;
    });
})
