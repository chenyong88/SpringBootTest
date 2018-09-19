$(function()
{
    $(document).on('change', '[name*=shareRules][name*=rate]', function()
    {
        if(!$.isNumeric($(this).val())) return false;

        computeTotal();
    });

    $(document).on('click', '.addItem', function()
    {
        var tr = $(this).parent().parent();
        tr.after('<tr>' + tr.html() + '</tr>');
        tr.next().find('select,input').val('');
        tr.next().find('.chosen-container').remove();
        tr.next().find('.chosen').chosen(window.chosenDefaultOptions);
    });

    $(document).on('click', '.delItem', function()
    {
        var tr = $(this).parent().parent();
        if($('.delItem').length == 1)
        {
            tr.find('select,input').val('');
            tr.find('.chosen').trigger('chosen:updated');
            return false;
        }

        tr.remove();
        computeTotal();
    });

    $('[name*=shareRules][name*=rate]').change();
})

function computeTotal()
{
    var totalRate  = 0;
    $('[name*=shareRules][name*=rate]').each(function()
    {
        if($.isNumeric($(this).val())) totalRate += parseFloat($(this).val());
    });

    totalRate = Math.round(totalRate * 100) / 100; 
    $('#totalRate').html(totalRate + '%');
}
