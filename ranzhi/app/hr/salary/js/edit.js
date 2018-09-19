$(document).ready(function()
{
    $(document).on('change', '.amount', function()
    {
        var bonus         = 0;
        var allowance     = 0;
        var exemption     = 0;
        var deduction     = 0;
        var bonusList     = $('.bonus');
        var allowanceList = $('.allowance');
        var exemptionList = $('.exemption');
        var deductionList = $('.deduction').not('.tax');
        for(i = 0; i < bonusList.size(); i++)
        {
            if($.isNumeric(bonusList[i].value)) bonus += parseFloat(bonusList[i].value);
        }
        for(i = 0; i < allowanceList.size(); i++)
        {
            if($.isNumeric(allowanceList[i].value)) allowance += parseFloat(allowanceList[i].value);
        }
        for(i = 0; i < exemptionList.size(); i++)
        {
            if($.isNumeric(exemptionList[i].value)) exemption += parseFloat(exemptionList[i].value);
        }
        for(i = 0; i < deductionList.size(); i++)
        {
            if($.isNumeric(deductionList[i].value)) deduction += parseFloat(deductionList[i].value);
        }

        var deserved = parseFloat($('#basic').val()) + parseFloat($('#benefit').val()) + bonus + allowance;
        if(!$(this).hasClass('tax'))
        {
            var preTaxAmount = deserved - exemption - deduction;
            var url          = createLink('salary', 'ajaxGetTax', 'amount=' + preTaxAmount);
            $.ajaxSettings.async = false;
            $.get(url, function(data)
            {
                $('.tax').val(data);
            });
            $.ajaxSettings.async = true;
        }
        var tax = $.isNumeric($('.tax').val()) ? parseFloat($('.tax').val()) : 0;
        if(tax > 0) 
        {
            $('.tax').parents('.itemDiv').show();
        }
        else
        {
            $('.tax').parents('.itemDiv').hide();
        }

        deduction += tax;
        var actual = deserved - deduction;

        bonus     = formatFloat(bonus);
        allowance = formatFloat(allowance);
        exemption = formatFloat(exemption);
        deduction = formatFloat(deduction);
        deserved  = formatFloat(deserved);
        actual    = formatFloat(actual);

        $('.totalbonus').val(bonus).html(bonus);
        $('.totalallowance').val(allowance).html(allowance);
        $('.totalexemption').val(exemption).html(exemption);
        $('.totaldeduction').val(deduction).html(deduction);
        $('#deserved').val(deserved);
        $('#actual').val(actual);
    });

    /* Add an item. */
    $(document).on('click', '.addItem', function()
    {
        var itemValue = $(this).parents('.itemDiv').find('[name*=items]').val();
        $(this).parents('.itemDiv').after(v.itemDiv.replace(/itemValue/g, itemValue));
        calcHeight();
    })

    /* Remove an item. */
    $(document).on('click', '.delItem', function()
    {
        var itemDiv = $(this).parents('.panel-body').find('.itemDiv');
        if(itemDiv.size() == 1) 
        {
            $(this).parents('.itemDiv').find('.amount').val('');
        }
        else
        {
            $(this).parents('.itemDiv').remove();
        }
        $('.amount:first').change();
    })

    $.setAjaxForm('#commissionForm', function(data)
    {
        if(data.result == 'success')
        {
            $('#commissionList').val(data.commissionList);
            $('#commissionList').parents('.itemDiv').find('.amount').val(formatFloat(data.commission));
            $('.amount:first').change();

            $.zui.closeModal();
        }
    });

    /* Add a line commission. */
    $(document).on('click', '.addCommission', function()
    {
        $(this).parents('tr').after(v.itemRow);
        var chosenDefaultOptions = {no_results_text: v.noResultsMatch, disable_search_threshold: 1, search_contains: true, width: '100%', allow_single_deselect: true};
        $(this).parents('tr').next().find('select').chosen(chosenDefaultOptions);

        var rowspan = parseInt($('#rowspanline').attr('rowspan'));
        $('#rowspanline').attr('rowspan', rowspan + 1);
    })

    /* Del a line commission. */
    $(document).on('click', '.delCommission', function()
    {
        if($('.delCommission').size() == 1)
        {
            $(this).parents('tr').find('input').val('');
        }
        else
        {
            var rowspan = parseInt($('#rowspanline').attr('rowspan'));
            $(this).parents('tr').remove();

            if($('#rowspanline').length == 0) $('.delCommission:first').parents('tr').prepend(v.itemTH);
            $('#rowspanline').attr('rowspan', rowspan - 1);
        }
        $('[name*=commissions]:first').change();
    })
    
    $('.amount:first').change();
    calcHeight();
});

function calcHeight()
{
    var height = 0;
    $('.itemGroup > div').css('height', 'auto');
    $('.itemGroup > div').each(function()
    {
        if(height < parseFloat($(this).css('height'))) height = parseFloat($(this).css('height'));
    });
    $('.itemGroup > div').css('height', height);
}
