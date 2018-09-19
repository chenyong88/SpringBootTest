$(document).ready(function()
{
    /* Add a trade detail item. */
    $(document).on('click', '.icon-plus', function()
    {
        if($('#hiddenDetail').length)
        {
            $(this).parents('tr').after($('#hiddenDetail').html().replace(/key/g, v.key));
            $(this).parents('tr').next().find("[name*='handlers']").chosen({no_results_text: '', placeholder_text:' ', disable_search_threshold: 1, search_contains: true, width: '100%'});
            $(this).parents('tr').next().find("[name*='category']").chosen({no_results_text: '', placeholder_text:' ', disable_search_threshold: 1, search_contains: true, width: '100%'});
        }

        v.key ++;
    });

    $('[name*=tradeIDList]').click(function()
    {
        $('.table-footer .text-danger .selectedMoney').empty();
        $('.table-footer .text-danger .selectedItem').hide();

        selectedMoney = new Array();
        $.each(v.currencyList, function(index, currency)
        {
            selectedMoney[index] = 0;
            $('[name*=tradeIDList]').each(function()
            {
                if($(this).prop('checked'))
                {
                    if($(this).parents('tr').data('currency') == index)
                    {
                        currentMoney = parseFloat($(this).parents('tr').data('money'));
                        selectedMoney[index] = selectedMoney[index] + currentMoney;
                    }
                }
            });
        });

        for(currency in selectedMoney)
        {
            money = selectedMoney[currency];
            money = money > 10000 ? Math.round(money / 10000 * 100) / 100 + v.unit : Math.round(money * 100) / 100;
            if(money)
            {
                $('.table-footer .text-danger .selectedMoney').append(v.currencyList[currency] + money + v.semicolon);
                $('.table-footer .text-danger .selectedItem').show();
            }
        }
    });

    /* Remove a trade detail item. */
    $(document).on('click', '.icon-remove', function()
    {
        if($('#hiddenDetail').length)
        {
            if($('#detailList > table tbody tr').size() > 1)
            {
                $(this).parents('tr').remove();
            }
            else
            {
                $(this).parents('tr').find('input,select').val('');
            }
        }
    });

    $('#submit').click(function()
    {
        var tradeChecked = false;

        $('[name*=tradeIDList]').each(function()
        {
            if($(this).prop('checked')) tradeChecked = true;
        })

        return tradeChecked;
    });

    if(v.treeview == '') 
    {
        $('a[href*=' + v.currentYear + ']').parents('li.expandable').find('ul').show();
        $('a[href*=' + v.currentYear + ']').parents('li').replaceClass('expandable', 'collapsable');
        $('a[href*=' + v.currentYear + ']').parents('li').replaceClass('lastExpandable', 'lastCollapsable');
        $('a[href*=' + v.currentYear + ']').parents('li').find('.hitarea').replaceClass('expandable-hitarea', 'collapsable-hitarea');
    }

    $('.trade-toggle').click(function()
    {
        var obj = $(this).find('i');
        if(obj.hasClass('icon-plus'))
        {
           obj.parents('tr').next('tr').show();
           obj.removeClass('icon-plus').addClass('icon-minus');
        }
        else if(obj.hasClass('icon-minus'))
        {
           obj.parents('tr').next('tr').hide();
           obj.removeClass('icon-minus').addClass('icon-plus');
        }
        return false;
    });

    fixTableFooter($('#tradeList'));
});
