$(document).ready(function()
{
    $(document).on('change', '.amount', function()
    {
        var total  = 0;
        var moneys = $('.amount');
        for(i = 0; i < moneys.size(); i++)
        {
            if($.isNumeric(moneys[i].value)) total += parseFloat(moneys[i].value);
        }

        total = formatCurrency(total, 2, ',');

        $('#total').html(total);
    });

    /* Add an item. */
    $(document).on('click', '.add', function()
    {
        $(this).parent().parent().after(v.itemRow.replace(/key/g, v.key));
        v.key++;
    })

    /* Remove an item. */
    $(document).on('click', '.remove', function()
    {
        if($('.remove').size() == 1)
        {
            $(this).parents('tr').find('input,select').val('');
            return;
        }
        $(this).parent().parent().remove();
        $('.amount:first').change();
    })

    $('.amount:first').change();
});
