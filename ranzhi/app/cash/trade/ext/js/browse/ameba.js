$(function()
{
    $(document).on('change', '[name*=money]', function()
    {
        $(this).parents('tr').find('[name*=rate]').val(Math.round($(this).val() / v.money * 10000) / 100);
        computeTotal();
    });

    $(document).on('change', '[name*=rate]', function()
    {
        $(this).parents('tr').find('[name*=money]').val(Math.round($(this).val() * 100 * v.money) / 10000);
        computeTotal();
    });

    $(document).on('click', '.addItem', function()
    {
        var tr = $(this).parents('tr');
        tr.after('<tr>' + tr.html() + '</tr>');
        tr.next().find('select, input').val('');
        tr.next().find('.chosen-container').remove();
        tr.next().find('.chosen').chosen(window.chosenDefaultOptions);

        computeTotal();
    });

    $(document).on('click', '.delItem', function()
    {
        var tr = $(this).parents('tr');
        if($('.delItem').length == 1)
        {
            tr.find('select, input').val('');
            tr.find('.chosen').trigger('chosen:updated');
            computeTotal();
            return false;
        }

        tr.remove();
        computeTotal();
    });
})

function computeTotal()
{
    var totalMoney = 0;
    var totalRate  = 0;
    $('[name*=money]').each(function()
    {
        if($.isNumeric($(this).val())) totalMoney += parseFloat($(this).val());
    });
    $('[name*=rate]').each(function()
    {
        if($.isNumeric($(this).val())) totalRate += parseFloat($(this).val());
    });

    totalMoney = Math.round(totalMoney * 100) / 100; 
    totalRate  = Math.round(totalRate * 100) / 100; 
    $('#totalMoney').html(totalMoney);
    $('#totalRate').html(totalRate + '%');
}
