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

    $('.batchShare').click(function()
    {
        $.getJSON($(this).data('url'), function(response)
        {
            if(response.result == 'success') 
            {
                $.zui.messager.success(response.message);

                if(response.locate)
                {
                   setTimeout(function(){return location.href = response.locate;}, 1000); 
                }
            }
            if(response.result == 'fail') $.zui.messager.info(response.message);
        });
    });

    $('.editTrade').click(function()
    {
        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/cash/') != -1) app = 'cash';

        if(app != '')
        {
            $.openEntry(app, href);
            return false;
        }
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

    $('#totalMoney').html(totalMoney);
    $('#totalRate').html(totalRate + '%');
}
