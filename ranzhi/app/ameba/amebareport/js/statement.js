$(function()
{
    showDatatable();

    $('#showDetail').change(function()
    {
        if(!v.showDetail) return false;

        var showDetail = $(this).prop('checked');
        $('.summary').toggle(!showDetail);
        $('.detail').toggle(showDetail);

        $.cookie('reportViewType', showDetail ? 'detail' : 'summary', {path: "/"});
    });

    $('[name=currencyUnit]').change(function()
    {
        var unit = $('[name=currencyUnit]:checked').val();
        $('#title .origin').toggle(unit == 'origin');
        $('#title .formated').toggle(unit == 'formated');
        $('.mainTable td').each(function()
        {
            if(unit == 'origin')
            {
                $(this).text($(this).data('origin'));
                if($(this).data('balance')) $(this).attr('title', $(this).data('balance'));
            }
            else
            {
                $(this).text($(this).data('formated'));
                if($(this).data('balanceformated')) $(this).attr('title', $(this).data('balanceformated'));
            }
        });

        $.cookie('reportCurrencyUnit', unit, {path: "/"});
    });

    $('.updateStatement').click(function()
    {
        $.getJSON($(this).data('url'), function(response)
        {
            if(response.result == 'success') 
            {
                $.zui.messager.success(response.message);

                if(response.locate)
                {
                   setTimeout(function(){return location.href = response.locate;}, 1000); 
                }
            }
            if(response.result == 'fail') $.zui.messager.info(response.message);
        });
    });

    $('#datatable-statement').find('th, td').click(function()
    {
        if($(this).parent().attr('data-row') !== undefined)
        {
            var actived = $(this).hasClass('active');

            $('#datatable-statement .active').removeClass('active');
            
            if(actived) return false;
            
            var attr = $(this).parent().attr('data-row');
            $('.' + attr).addClass('active');
            $('.' + attr).find('td').addClass('active');
        }
    });

    $('.archive').click(function()
    {
        $.getJSON($(this).prop('href'), function(response)
        {
            bootbox.alert(response.message);
        });
    });

    if(v.showDetail)
    {
        var reportViewType = $.cookie('reportViewType');
        if(typeof(reportViewType) == 'undefined' || reportViewType == '') reportViewType = 'summary';
        $('#showDetail').prop('checked', reportViewType == 'detail' ? true : false).change();
    }

    var reportCurrencyUnit = $.cookie('reportCurrencyUnit');
    if(typeof(reportCurrencyUnit) == 'undefined' || reportCurrencyUnit == '') reportCurrencyUnit = 'formated';
    $('[name=currencyUnit][value=' + reportCurrencyUnit + ']').click().prop('true');
})

function showDatatable()
{
    /* statement table. */
    var $statement = $('#statement');

    /* Compute width of all columns in center. */
    var centerColWidth = $('#statementHeadCenter>table>thead>tr:first>th').length * v.colWidth;
    $('#statementHeadCenter').attr('data-width', centerColWidth);

    var datatableOptions = {
      fixedLeftWidth: v.leftWidth, 
      fixedRightWidth: v.rightWidth,
      sortable: false,
      rowHover: false,
      colHover: false,
      scrollPos: 'in',
      fixedHeader: true,
      fixedHeaderOffset: 0,
      storage: false
    };

    /* Init data table. */
    $statement.datatable(datatableOptions);
}
