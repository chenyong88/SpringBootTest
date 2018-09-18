$(function()
{
    $.setAjaxForm('#closeForm');
    $.setAjaxForm('#doubtForm');
    $.setAjaxForm('#replyForm');

    $('#menu li').removeClass('active').find('[href*=' + v.type + ']').parent().addClass('active');
})
