$(document).ready(function()
{
    $(document).on('change', '#money', function()
    {
        var currentMoney = $(this).val();
        if(!$.isNumeric(currentMoney)) return false;

        var contractMoney  = $('#contract').find('option:selected').attr('data-amount');
        var currentInvoice = typeof(v.invoiceID) == 'undefined' ? '' : v.invoiceID;
        $.get(createLink('invoice', 'ajaxGetDrawnMoney', "contractID=" + $('#contract').val() + '&invoiceID=' + currentInvoice), function(openedMoney)
        {
            if(parseFloat(contractMoney) < parseFloat(openedMoney) + parseFloat(currentMoney))
            {
                $('#money').parents('td').find('#moneyLabel').html(v.moneyTip).show();
            }
            else
            {
                $('#money').parents('td').find('#moneyLabel').empty().hide();
            }
        });
    });

    /* Sum detail money for total. */
    $(document).on('change', 'input[name^=moneyList]', function()
    {
        var total = 0;
        $('input[name^=moneyList]').each(function()
        {
            if($.isNumeric($(this).val())) total += parseFloat($(this).val());
        });

        total = Math.round(total * 100) / 100;
        $('#money').val(total);
        return false;
    });

    $(document).on('change', 'input[name^=priceList]', function()
    {
        var amount = $(this).parent('td').parent('tr').find('input[name^=amountList]').val();
        if($.isNumeric($(this).val()) && $.isNumeric(amount))
        {
            var price = parseFloat($(this).val());
            amount = parseFloat(amount);

            var detailMoney = Math.round(price * amount * 100) / 100;
            $(this).parent('td').parent('tr').find('input[name^=moneyList]').val(detailMoney);

            $('input[name^=moneyList]').change();
        }
        return false;
    });

    $(document).on('change', 'input[name^=amountList]', function()
    {
        var price = $(this).parent('td').parent('tr').find('input[name^=priceList]').val();
        if($.isNumeric($(this).val()) && $.isNumeric(price))
        {
            var amount = parseFloat($(this).val());
            price = parseFloat(price);

            var detailMoney = Math.round(price * amount * 100) / 100;
            $(this).parent('td').parent('tr').find('input[name^=moneyList]').val(detailMoney);

            $('input[name^=moneyList]').change();
        }
        return false;
    });

    /* Add a invoice detail item. */
    $(document).on('click', '.table-detail .icon-plus', function()
    {
        $(this).closest('tr').after($('#detailTpl').html());
        $(this).closest('tr').next().find("select").chosen({no_results_text: v.noResultsMatch, disable_search_threshold: 1, search_contains: true, width: '100%', allow_single_deselect: true});
        return false;
    });

    /* Remove a invoice detail item. */
    $(document).on('click', '.table-detail .icon-remove', function()
    {
        if($('#detailBox tr').size() > 1)
        {
            $(this).closest('tr').remove();
        }
        else
        {
            $(this).closest('tr').find('input,select').val('');
        }
        $('input[name^=moneyList]').change();
        return false;
    });
})
