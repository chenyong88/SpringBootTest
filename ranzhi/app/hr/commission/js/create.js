$(document).ready(function()
{
    $('#menu .nav li').removeClass('active').find('a[href*=' + v.type + ']').parent().addClass('active');    

    $('a.reset').click(function()
    {
        if(confirm(v.confirmReset))
        {
            window.location = $(this).attr('href');
        }
        return false;
    });

    /* Add a trade detail item. */
    $(document).on('click', '.addItem', function()
    {
        if($(this).parents('table').hasClass('table-fixedCommission')) $(this).parents('tr').after(v.fixedItemRow.replace(/key/g, v.key));
        if($(this).parents('table').hasClass('table-multistepCommission')) $(this).parents('tr').after(v.multistepItemRow.replace(/key/g, v.key));
        $(this).parents('tr').next().find('select').chosen(window.chosenDefaultOptions);
        v.key ++;
    });

    $(document).on('click', '.delItem', function()
    {
        if($(this).parents('table').find('.delItem').size() > 1)
        {
            $(this).parents('tr').remove();
        }
        
        if($(this).parents('tr').find('input').parent('span').is(':hidden')) $(this).parents('tr').find('.saleCommission').toggle();

        $(this).parents('tr').find('[name*=contribution], [name*=rate], [name*=amount]').val(0);

        computeRate();
        computeAmount();
    });

    $('.editItem').click(function()
    {
        $(this).parents('tr').find('.saleCommission').toggle();
    });

    $(document).on('change', '#commission', function()
    {
        $('[name*=rate]').change();
    });

    $(document).on('change', '[name*=contribution]', function()
    {
        var contribution = 0;
        $('[name*=contribution]').each(function()
        {
            if($.isNumeric($(this).val())) contribution += parseFloat($(this).val());
        });

        contribution = Math.round(contribution * 100) / 100;
        $(this).parents('.table-multistepCommission').find('tfoot td.contribution').html(contribution);
    });

    $(document).on('change', '[name*=rate]', function()
    {
        var rate       = $(this).val() == '' ? 0 : $(this).val();
        var commission = $('#commission').val();
        if(!$.isNumeric(rate) || !$.isNumeric(commission)) return;

        var amount = parseFloat(rate) * parseFloat(commission) / 100;
        amount = Math.round(amount * 100) / 100; 
        amount = amount == 0 ? '' : amount;
        $(this).parents('tr').find('[name*=amount]').val(amount);
        $(this).parents('tr').find('span.amount').html(amount);

        computeRate();
        computeAmount();
    });

    $(document).on('change', '[name*=amount]', function()
    {
        var amount     = $(this).val();
        var commission = $('#commission').val();
        if(!$.isNumeric(amount) || !$.isNumeric(commission)) return;

        var rate = parseFloat(amount) / parseFloat(commission) * 100;
        rate   = Math.round(rate * 100) / 100; 
        rate   = rate == 0 ? '' : rate;
        $(this).parents('tr').find('[name*=rate]').val(rate);
        
        computeRate();
        computeAmount();
    });

    computeRate();
    computeAmount();
});

function computeRate()
{
    var rate = 0;
    $('.table-fixedCommission').find('[name*=rate]').each(function()
    {
        if($.isNumeric($(this).val())) rate += parseFloat($(this).val());
    });

    rate = Math.round(rate * 100) / 100; 
    $('tfoot td.rate').html(rate);
}

function computeAmount()
{
    var amount = 0;
    $('.table-fixedCommission').find('[name*=amount]').each(function()
    {
        if($.isNumeric($(this).val())) amount += parseFloat($(this).val());
    });

    amount = Math.round(amount * 100) / 100; 
    $('tfoot td.amount').html(amount);
}
