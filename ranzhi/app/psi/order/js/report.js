$(document).ready(function()
{
    $('#' + v.searchType).css('font-weight','bold');

    $('#searchTab').click(function()
    {
        if($(this).hasClass('active')) $(this).removeClass('active')
        else $(this).addClass('active');
        $('#querybox').toggle();
    });

    if(v.searchType == 'bysearch') $('#searchTab').click();
})
