$(document).ready(function()
{
    var left  = $('.tab-content').offset().left;
    var width = $('.tab-content').width();
    $('#rightDocker').css('left', left + width);

    $('[name*=hidePrice]').click(function()
    {
        var rowspan = parseInt($('.desc').attr('rowspan'));
        var colspan = parseInt($('.table-footer').attr('colspan'));
        if($(this).is(':checked'))
        {
            $('.desc').attr('rowspan', rowspan - 1);
            $('.table-footer').attr('colspan', colspan - 2);
        }
        else
        {
            $('.desc').attr('rowspan', rowspan + 1);
            $('.table-footer').attr('colspan', colspan + 2);
        }
        $('.price').toggle();
        $('.money').toggle();
    });
    
    $('.printBtn').click(function()
    {
        $('.printTitle').html($(this).attr('data-title'));
        $('#orderDIV').html('');
        $('#invoiceDIV').html($('#invoiceHiddenDIV').html());
        $('#printarea').printArea();
    });

    $('.printOrder').click(function()
    {
        $('#orderDIV').html($('#orderHiddenDIV').html());
        $('#invoiceDIV').html('');
        $('#printarea').printArea();
    });

    var $pageList = $("a[data-toggle='tab']");
    $pageList.filter(':first').css({color:'black', 'text-decoration':'inherit', 'cursor':'default'});
    $("a[data-toggle='tab']").on('click', function(){
        $pageList.css({color:'', 'text-decoration':'', 'cursor':'auto'});
        $(this).css({color:'black', 'text-decoration':'inherit', 'cursor':'default'});
    })

});
