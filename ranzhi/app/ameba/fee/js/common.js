$(function()
{
    $('#month').change(function()
    {
        $('#type').change();
    });
    
    $('#type').change(function()
    {
        if($(this).val() == 'budget')
        {
            var period = 'year';
            $('#period').val(period).attr('disabled', 'disabled').trigger('chosen:updated');
            $('input[type=hidden][name=period]').val(period).removeAttr('disabled');
        }
        else if($(this).val() == 'period')
        {
            $('#period').removeAttr('disabled').trigger('chosen:updated');
            $('input[type=hidden][name=period]').attr('disabled', 'disabled');
        }
    });

    $('#year, #month, #category, #dept').change(function()
    {
        var month = '';
        if($('#year').length > 0 && $('#month').length > 0)
        {
            month = $('#year').val() + $('#month').val();
        }
        $.get(createLink('fee', 'ajaxGetMoney', 'month=' + month + '&dept=' + $('#dept').val() + '&category=' + $('#category').val()), function(money)
        {
            $('#money').val(money).change();
        });
    });

    $('#shareType').change(function()
    {
        if($(this).val() == 'person')
        {
            $('[name*=shareFees][name*=rate]').val('').attr('readonly', 'readonly');
            $('[name*=shareFees][name*=money]').val('').attr('readonly', 'readonly');
        }
        else
        {
            $('[name*=shareFees][name*=rate]').val('').removeAttr('readonly');
            $('[name*=shareFees][name*=money]').val('').removeAttr('readonly');
        }
    });

    $('#money').change(function()
    {
        if(!$.isNumeric($(this).val())) return false;

        v.totalMoney = $(this).val();
        $('[name*=shareFees][name*=rate]').change();
    });

    $(document).on('change', '[name*=shareFees][name*=dept]', function()
    {
        var tr = $(this).parent().parent();
        if($('#shareType').val() != 'person') return false;

        var person = parseInt($(this).find('option:selected').attr('data-person')); 
        tr.find('[name*=shareFees][name*=rate]').val(Math.round(v.averageRate * person * 100) / 100);
        tr.find('[name*=shareFees][name*=money]').val(Math.round(v.averageRate * person / 100 * v.totalMoney * 100) / 100);
        computeTotal();
    });

    $(document).on('change', '[name*=shareFees][name*=rate]', function()
    {
        if(!$.isNumeric($(this).val())) return false;

        $(this).parent().parent().parent().find('[name*=shareFees][name*=money]').val(Math.round(v.totalMoney * $(this).val()) / 100);  
        computeTotal();
    });

    $(document).on('change', '[name*=shareFees][name*=money]', function()
    {
        if(!$.isNumeric($(this).val())) return false;

        $(this).parent().parent().find('[name*=shareFees][name*=rate]').val(Math.round($(this).val() / v.totalMoney * 10000) / 100);
        computeTotal();
    });

    $(document).on('click', '.addItem', function()
    {
        var tr = $(this).parent().parent();
        tr.after('<tr>' + tr.html() + '</tr>');
        tr.next().find('select,input').val('');
        tr.next().find('.chosen-container').remove();
        tr.next().find('[name*=shareFees][name*=dept]').chosen(window.chosenDefaultOptions);
    });

    $(document).on('click', '.delItem', function()
    {
        var tr = $(this).parent().parent();
        if($('.delItem').length == 1)
        {
            tr.find('select,input').val('');
            tr.find('[name*=shareFees][name*=dept]').trigger('chosen:updated');
            return false;
        }

        tr.remove();
        computeTotal();
    });

    $('#type').change();
    $('[name*=shareFees][name*=dept]').change();

    if($('#shareType').val() == 'person')
    {
        $('[name*=shareFees][name*=rate]').attr('readonly', 'readonly');
        $('[name*=shareFees][name*=money]').attr('readonly', 'readonly');
    }
})

function computeTotal()
{
    var totalRate  = 0;
    var totalMoney = 0;
    $('[name*=shareFees][name*=rate]').each(function()
    {
        if($.isNumeric($(this).val())) totalRate += parseFloat($(this).val());
    });
    $('[name*=shareFees][name*=money]').each(function()
    {
        if($.isNumeric($(this).val())) totalMoney += parseFloat($(this).val());
    });

    totalRate  = Math.round(totalRate * 100) / 100; 
    totalMoney = Math.round(totalMoney * 100) / 100; 
    $('#totalRate').html(totalRate + '%');
    $('#totalMoney').html(totalMoney);
}
