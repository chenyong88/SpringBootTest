$(document).ready(function()
{
    $(document).on('change', '[name*=amounts], [name*=rates]', function()
    {
        var amount = $(this).parents('tr').find('[name*=amounts]').val();
        var rate   = $(this).parents('tr').find('[name*=rates]').val();
        if(!$.isNumeric(amount) || !$.isNumeric(rate)) return false;

        $(this).parents('tr').find('[name*=commissions]').val(formatFloat(parseFloat(amount) * parseFloat(rate) / 100));

        $('[name*=commissions]:first').change();
    });

    $(document).on('change', '[name*=commissions]', function()
    {
        var total = 0;
        $('[name*=commissions]').each(function()
        {
            if($.isNumeric($(this).val())) total += parseFloat($(this).val());
        });
        $('.totalCommission').html(formatFloat(total));
    });

    $('[name*=commissions]:first').change();
});
