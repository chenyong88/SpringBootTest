$(document).ready(function()
{
    $('[name*=commission]').css('height', '25px');
    $('[name*=commission]').css('padding', '4px');
    $('[name*=commission]').parent('td').css('padding', '4px');

    $.setAjaxForm('#singleForm');
    $.setAjaxForm('#togetherForm');

    computeContribution();
    computeRate();
    computeAmount();

    $('.single-btn').click(function()
    {
        $('#togetherForm').addClass('hide');
        $('#singleForm').removeClass('hide');

        computeContribution();
        computeRate();
        computeAmount();
    });

    $('.together-btn').click(function()
    {
        $('#singleForm').addClass('hide');
        $('#togetherForm').removeClass('hide');

        computeContribution();
        computeRate();
        computeAmount();
    })

    $(document).on('click', '#singleForm .icon-plus', function()
    {
        if($('#singleForm #commissionTR').length)
        {
            $(this).closest('tr').after($('#singleForm #commissionTR').html());
            var rowspan = $(this).parents('.table-commission').find('#rowspanTH').attr('rowspan');
            $(this).parents('.table-commission').find('#rowspanTH').attr('rowspan', rowspan + 1);
        }
    });

    $(document).on('click', '#togetherForm .icon-plus', function()
    {
        if($('#commissionTR').length) $(this).closest('tr').after($('#togetherForm #commissionTR').html());
    });

    $(document).on('click', '.icon-remove', function()
    {
        if($(this).closest('.table-commission').find('.icon-remove').size() > 2)
        {
            $(this).parent().parent('tr').remove();
        }
        else
        {
            $(this).closest('tr').find('input,select').val('');
        }

        computeContribution();
        computeRate();
        computeAmount();
    });

    $(document).on('change', '#singleForm [name*=commission]', function()
    {
        $('[name*=rate]').change();
    });

    $(document).on('change', '[name*=contribution]', function()
    {
        computeContribution();
    });

    $(document).on('change', '[name*=rate]', function()
    {
        if($(this).parents('#singleForm').length)
        {
            var rate = $(this).val();
            var base = $(this).parents('.table-commission').parents('tr').prev('tr').find('[name*=commission]').val();
            if(!$.isNumeric(base) || !$.isNumeric(rate)) return;

            var amount = parseFloat(parseFloat(rate) * parseFloat(base)) / 100;
            amount = Math.round(amount * Math.pow(10, 2)) / Math.pow(10, 2);
            amount = amount == 0 ? '' : amount;
            $(this).parent('div').parent('td').next('td').find('[name*=amount]').val(amount);
            $(this).parent('td').next('td').find('[name*=amount]').val(amount);
            $(this).parent('td').next('td').find('span.amount').html(amount);
        }

        computeRate();
        computeAmount();
    });

    $(document).on('change', '[name*=amount]', function()
    {
        if($(this).parents('#singleForm').length)
        {
            var amount = $(this).val();
            var base = $(this).parents('.table-commission').parents('tr').prev('tr').find('[name*=commission]').val();
            if(!$.isNumeric(base) || !$.isNumeric(amount)) return;

            var rate = parseFloat(amount) / parseFloat(base) * 100;
            rate   = Math.round(rate * Math.pow(10, 2)) / Math.pow(10, 2);
            rate   = rate   == 0 ? '' : rate;
            $(this).parent('td').prev('td').find('[name*=rate]').val(rate);
        }

        computeRate();
        computeAmount();
    });

    $(document).on('change', '[name*=commission]', function()
    {
        computeAmount();
    });

    $('[name*=rate]').change();
});

function computeContribution()
{
    $('.table-commission').each(function()
    {
        if(!$(this).parents('.hide').length)
        {
            var contribution = 0;
            $(this).find('[name*=contribution]').each(function()
            {
                if($.isNumeric($(this).val())) contribution += parseFloat($(this).val());
            });

            contribution = Math.round(contribution * Math.pow(10,2)) / Math.pow(10,2);
            contribution = contribution == 0 ? '' : contribution + '%'; 
            $(this).find('.total-contribution').html(contribution);
        }
    })
}

function computeRate()
{
    $('.table-commission').each(function()
    {
        if(!$(this).parents('.hide').length)
        {
            var rate = 0;
            $(this).find('[name*=rate]').each(function()
            {
                if($.isNumeric($(this).val())) rate += parseFloat($(this).val());
            });

            rate = Math.round(rate * Math.pow(10, 2)) / Math.pow(10, 2);
            rate = rate == 0 ? '' : rate + '%'; 
            $(this).find('.total-rate').html(rate);
        }
    });
}

function computeAmount()
{
    $('.table-commission').each(function()
    {
        if(!$(this).parents('.hide').length)
        {
            var amount      = 0;
            var amounts     = $(this).find('[name*=amount]');
            var rates       = $(this).find('[name*=rate]');
            var commissions = $(this).parents('tr').length > 0 ? $(this).parents('tr').prev('tr').find('[name*=commission]') : $('[name*=commission]');
            for(i = 0; i < commissions.size(); i++)
            {
                if(!$.isNumeric(commissions[i].value)) continue;

                commission = parseFloat(commissions[i].value);
                for(j = 0; j < amounts.size(); j++)
                {
                    if($.isNumeric(amounts[j].value) && parseFloat(amounts[j].value) > 0) 
                    {
                        amount += parseFloat(amounts[j].value);
                    }
                    else if($.isNumeric(rates[j].value))
                    {
                        amount += parseFloat(rates[j].value) * commission / 100;
                    }
                }
            }

            amount = Math.round(amount * Math.pow(10, 2)) / Math.pow(10, 2);
            if($(this).parents('#togetherForm').length)
            {
                amount = amount == 0 ? '' : amount + v.tips; 
            }
            else
            {
                amount = amount == 0 ? '' : amount; 
            }
            $(this).find('.total-amount').html(amount);
        }
    });
}
