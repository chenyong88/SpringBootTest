$(document).ready(function()
{
    $('#menu .nav li').removeClass().find('[href*=' + v.type + ']').parent('li').addClass('active');

    /* expand active tree. */
    $('.tree li.active .hitarea').click();

    fixTableHeader();
});
