$(document).ready(function()
{
    if(config.requesetType == 'GET')
    {
        $('#mainNavbar li').removeClass('active').find("[href*='=" + v.mode + "']").parent().addClass('active');
    }
    else
    {
        $('#mainNavbar li').removeClass('active').find('[href*=' + v.mode + ']').parent().addClass('active');
    }
    $("#menu .nav a[href*=" + config.currentMethod + "]").parent().addClass('active');
    $("#mainNavbar .navbar-nav a[href*=salary][href*=report]").parent().addClass('active');

    fixTableFooter($('#reportTable'));
    adjustFooterSize();

    $(window).resize(adjustFooterSize);
})

function adjustFooterSize()
{
    var footers = $('.table-footer th, .table-footer td');
    var headers = $('#reportTable thead th');

    for (var i = footers.length - 1; i >= 0; i--)
    {
        $(footers[i]).css('width', parseInt($(headers[i]).css('width')) || $(headers[i]).width());
    };
}
