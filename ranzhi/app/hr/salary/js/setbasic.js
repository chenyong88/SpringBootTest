$(document).ready(function()
{
    $('.delItem').click(function()
    {
        $(this).parents('tr').find('span.basicItem').hide();
        $(this).parents('tr').find('input.basicItem').show();
        $(this).parents('tr').find('[name*=basic]').focus();
        $(this).parents('tr').find('span.basicItem').html('');
        $(this).parents('tr').find('[name*=basic], [name*=benefit], [name*=exemption]').val('');
        $(this).parents('tr').find('[name*=basic]').change();
    });

    $('.editItem').click(function()
    {
        $(this).parents('tr').find('.basicItem').toggle();
        $(this).parents('tr').find('.basic').focus();
    });

    $('[name*=basic], [name*=benefit], [name*=exemption]').change(function()
    {
        var totalBasic     = 0;
        var totalBenefit   = 0;
        var totalExemption = 0;
        var totalMoney     = 0;
        var basicList      = $('[name*=basic]');
        var benefitList    = $('[name*=benefit]');
        var exemptionList  = $('[name*=exemption]');
        for(i = 0; i < basicList.size(); i++)
        {
            var basic     = $.isNumeric(basicList[i].value) ? parseFloat(basicList[i].value) : 0;
            var benefit   = $.isNumeric(benefitList[i].value) ? parseFloat(benefitList[i].value) : 0;
            var exemption = $.isNumeric(exemptionList[i].value) ? parseFloat(exemptionList[i].value) : 0;
            var total     = basic + benefit;

            totalBasic     += basic;
            totalBenefit   += benefit;
            totalExemption += exemption;
            totalMoney     += total;

            basic     = basic     == 0 ? '' : basic;
            benefit   = benefit   == 0 ? '' : benefit;
            exemption = exemption == 0 ? '' : exemption;
            total     = formatCurrency(total, 2, ',');
            $(basicList[i]).parents('tr').find('span.basic').html(basic);
            $(basicList[i]).parents('tr').find('span.benefit').html(benefit);
            $(basicList[i]).parents('tr').find('span.exemption').html(exemption);
            $(basicList[i]).parents('tr').find('#total').html(total);
        }

        totalBasic     = formatCurrency(totalBasic, 2, ',');
        totalBenefit   = formatCurrency(totalBenefit, 2, ',');
        totalExemption = formatCurrency(totalExemption, 2, ',');
        totalMoney     = formatCurrency(totalMoney, 2, ',');

        $('#totalBasic').html(totalBasic);
        $('#totalBenefit').html(totalBenefit);
        $('#totalExemption').html(totalExemption);
        $('#totalMoney').html(totalMoney);
    });

    $('[name*=basic]:first').change();
});
