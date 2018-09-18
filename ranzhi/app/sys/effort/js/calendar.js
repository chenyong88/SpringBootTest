/* open view page. */
function viewTodo(obj)
{
    $.zui.modalTrigger.show($.extend({backdrop: 'static'}, $(obj).data()));
}

$(document).ready(function()
{
    $('#mainNavbar .nav > li').removeClass('active').find('a[href*=effort][href*=calendar]').parent('li').addClass('active');

    /* Adjust calendar' startDate. */
    $('.calendar').data('zui.calendar').display('month', v.settings.startDate);

    /* adjust focus position. */
    if($('.current').offset().top >= $(window).scrollTop() + $(window).height()) $(window).scrollTop($('.current').offset().top);

    fixTableHeader();
});
