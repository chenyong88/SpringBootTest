$(function()
{
    $.setAjaxForm('#createForm', function(response)
    {
        if(response.result == 'fail')
        {
            if(response.error && response.error.length)
            {
                $('#duplicateError').html($('.errorMessage').html());
                $('#duplicateError .alert').prepend(response.error).show();

                $(document).on('click', '#duplicateError #continueSubmit', function()
                {
                    $('#duplicateError').append("<input value='1' name='continue' class='hide'>");
                    $('#submit').attr('type', 'button');
                })
            }
        }
        else
        {
            setTimeout(function(){location.href = response.locate;}, 1200);
        }
    });

    $('#createTrader').click(function()
    {
        $(this).parents('td').find('.required').hide();
        if($(this).prop('checked')) 
        {
            $('#trader').hide();
            $('#trader_chosen').hide();
            $('#newTrader').show().focus();
            $('.traderInfo').show();
        }
        else
        {
            $('#trader_chosen').show();
            $('#newTrader').hide();
            $('.traderInfo').hide();
        }
    });

    $('#trader').change(function()
    {
        if($('#origin').val() == 'contract')
        {
            var contract = $('#contract').val();
            var url = createLink('receivable', 'ajaxGetContracts', 'trader=' + $('#trader').val());
            $('#contract').load(url, function()
            {
                if(contract) $('#contract').val(contract);
                $('#contract').trigger('chosen:updated');
            });
        }
        else if($('#origin').val() == 'sale')
        {
            var order = $('#order').val();
            var url = createLink('receivable', 'ajaxGetOrders', 'type=' + $(this).val() + '&trader=' + $('#trader').val());
            $('#order').load(url, function()
            {
                if(order) $('#order').val(order);
                $('#order').trigger('chosen:updated');
            });
            var batch = ('#batch').val();
            url = createLink('receivable', 'ajaxGetBatches', 'type=' + $(this).val() + '&trader=' + $('#trader').val());
            $('#batch').load(url, function()
            {
                if(batch) $('#batch').val(batch);
                $('#batch').trigger('chosen:updated');
            });
        }
    });

    $('#origin').change(function()
    {
        if($(this).val() == 'other')
        {
            $('#contract, #order, #batch').parents('tr').hide();
            $('#desc').prev('div.required').show();
        }
        else if($(this).val() == 'early')
        {
            $('#contract, #order, #batch').parents('tr').hide();
            $('#desc').prev('div.required').hide();
        }
        else if($(this).val() == 'contract')
        {
            $('#contract').parents('tr').show();
            $('#order, #batch').parents('tr').hide();
            $('#desc').prev('div.required').hide();
            var contract = $('#contract').val();
            var url = createLink('receivable', 'ajaxGetContracts', 'trader=' + $('#trader').val());
            $('#contract').load(url, function()
            {
                if(contract) $('#contract').val(contract);
                $('#contract').trigger('chosen:updated');
            });
        }
        else if($(this).val() == 'sale')
        {
            $('#contract').parents('tr').hide();
            $('#order, #batch').parents('tr').show();
            $('#desc').prev('div.required').hide();
            var order = $('#order').val();
            var url = createLink('receivable', 'ajaxGetOrders', 'type=' + $(this).val() + '&trader=' + $('#trader').val());
            $('#order').load(url, function()
            {
                if(order) $('#order').val(order);
                $('#order').trigger('chosen:updated');
            });
            var batch = $('#batch').val();
            url = createLink('receivable', 'ajaxGetBatches', 'type=' + $(this).val() + '&trader=' + $('#trader').val());
            $('#batch').load(url, function()
            {
                if(batch) $('#batch').val(batch);
                $('#batch').trigger('chosen:updated');
            });
        }
    });

    $('#contract').change(function()
    {
        if($(this).val() != 0)
        {
            $('#deserved').val($(this).find('option:selected').data('money'));
        }
    });

    $('#order').change(function()
    {
        if($(this).val() != 0)
        {
            $('#deserved').val($(this).find('option:selected').data('money'));
            var batch = $('#batch').val();
            var url = createLink('receivable', 'ajaxGetBatches', 'type=' + $('#origin').val() + '&trader=' + $('#trader').val() + '&order=' + $(this).val());
            $('#batch').load(url, function()
            {
                if(batch) $('#batch').val(batch);
                $('#batch').trigger('chosen:updated');
            });
        }
    });

    $('#batch').change(function()
    {
        if($(this).val() != 0)
        {
            $('#deserved').val($(this).find('option:selected').data('money'));
        }
    });

    $('#deserved, #actual').change(function()
    {
        var deserved = $.isNumeric($('#deserved').val()) ? parseFloat($('#deserved').val()) : 0;
        var actual   = $.isNumeric($('#actual').val())   ? parseFloat($('#actual').val()) : 0;
        $('#balance').val(deserved - actual);
    });

    $('#origin').change();
})
