$(document).ready(function()
{
    if(v.mode == 'list')
    {
        /* expand active tree. */
        $('.tree li.active:last .hitarea').click();
    }

    if(v.mode == 'list' || v.mode == 'create' || v.mode == 'edit')
    {
        $('.nav li').removeClass('active');
        $('.nav li > a[href*=setssf][href*=list]').parent().addClass('active');
    }

    $('.ssf').change(function()
    {
        var totalPersonal = 0;
        var totalCompany  = 0;
        var moneys        = $('.amount');
        var companyRates  = $('.companyRate');
        var personalRates = $('.personalRate');
        for(i = 0; i < moneys.size(); i++)
        {
            if($.isNumeric(moneys[i].value) && $.isNumeric(personalRates[i].value) && $.isNumeric(companyRates[i].value))
            {
                totalCompany  += parseFloat(moneys[i].value * companyRates[i].value / 100);
                totalPersonal += parseFloat(moneys[i].value * personalRates[i].value / 100);
            }
        }

        totalCompany  = formatCurrency(totalCompany, 2, ',');
        totalPersonal = formatCurrency(totalPersonal, 2, ',');

        $('#totalCompany').html(totalCompany);
        $('#totalPersonal').html(totalPersonal);
    });

    $('.ssf:first').change();
});
