$(function()
{
    $('#menu > .nav > li').removeClass('active');
    $('#menu > .nav > li > a[href*=' + v.mode + ']').parent().addClass('active');

    $('.batchAssign').click(function()
    {
        $('#browseForm').submit();        
    });
});
