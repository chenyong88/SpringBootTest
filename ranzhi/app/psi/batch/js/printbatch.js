$(document).ready(function()
{
    if(v.status != '') $('#menu .nav > li').removeClass('active').find('[href*=' + v.status+ ']').parent().addClass('active');

    var left  = $('.tab-content').offset().left;
    var width = $('.tab-content').width();
    $('#rightDocker').css('left', left + width);

    $('[name*=hidePrice]').click(function()
    {
        var rowspan = parseInt($('.desc').attr('rowspan'));
        if($(this).is(':checked'))
        {
            $('.desc').attr('rowspan', rowspan - 1);
        }
        else
        {
            $('.desc').attr('rowspan', rowspan + 1);
        }
        $('.price').toggle();
        $('.money').toggle();
    });

    $('.printBtn').click(function()
    { 
        $('.printTitle').html($(this).attr('data-title'));
        $('#printarea').printArea(); 
    });

    var $pageList = $("a[data-toggle='tab']");
    $pageList.filter(':first').css({color:'black', 'text-decoration':'inherit', 'cursor':'default'});
    $("a[data-toggle='tab']").on('click', function(){
        $pageList.css({color:'', 'text-decoration':'', 'cursor':'auto'});
        $(this).css({color:'black', 'text-decoration':'inherit', 'cursor':'default'});
    })
});
