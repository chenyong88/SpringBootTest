$(function()
{
    if(v.mode == 'browse') $('#menu li').removeClass('active').find('[href*=' + v.status + ']').parent().addClass('active');
    $('#category' + v.category).parent('li').addClass('active');

    /* expand active tree. */
    $('.tree li.active .hitarea').click();
})
