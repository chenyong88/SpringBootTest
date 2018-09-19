$(document).ready(function()
{
    $.setAjaxForm('#detailList', null, function()
    {
        var totalMoney = 0;
        $("#detailList table input[name*='money']").each(function()
        {
            var money = parseFloat($(this).val());
            if(!isNaN(money)) totalMoney = totalMoney + money;
        });

        if(totalMoney != v.money) return confirm(v.detailTip);
    });
});
