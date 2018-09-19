$(document).ready(function()
{
    $.setAjaxForm('#orderForm', function(response)
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

    $.setAjaxForm('#createForm', function(data)
    {
        if(data.result == 'success') 
        {
            var element = data.element;
            var product = data.product;

            /* Update the dropdown list of all products. */
            $('.select-product').each(function()
            {
                var productID = $(this).val();
                $(this).load(createLink('order', 'ajaxGetProducts'), function()
                {
                    /* Update the product of current row. */
                    if($(this).attr('id') == element)
                    {
                        $(this).val(product);
                        $(this).change();
                    }
                    /* If the product of other rows has been selected retain it. */
                    else if(productID != 0)
                    {
                        $(this).val(productID);
                    }
                    $(this).trigger('chosen:updated');
                });
            });
            $.zui.closeModal();
        }
    })

    /* When trader changed remove the error warning. */
    $('#trader').change(function()
    {
        $(this).parents('tr').find('.text-error').remove();
    })

    /* When checkbox of new trader checked switch tags display. */
    $('.createTrader').click(function()
    {
        $('.newTrader').toggle();
        $('input.newTrader').val('');
        $('#trader_chosen').toggle();
        /* Remove the batch check labels and css. */
        $('#newTraderLabel').remove();
        $('#newTrader').css('border-color', '');
    });

    /* When checkbox of new product checked switch tags display. */
    $(document).on('change', '.createProduct', function()
    {
        var parentRow = $(this).parents('tr');
        parentRow.find('input').val('');
        parentRow.find('select').val('');
        parentRow.find('.product-newProduct').toggle();
        parentRow.find('div[id*=product]').toggle();
        parentRow.find('.chosen-container').find('.chosen-single').find('span').html('');
        parentRow.find('.chosen-container').find('.chosen-single').find('abbr').remove();
        /* Remove the batch check labels and css. */
        parentRow.find('.text-error').remove(); 
        parentRow.find('input').css('border-color', '');
    });

    /* Add a row of product. */
    $(document).on('click', '.btn-plus', function()
    {
        $(this).parents('tr').after('<tr>' + $(this).parents('tr').html() + '</tr>');
        var rowspan = $('#product_title').attr('rowspan');
        $('#product_title').attr('rowspan', parseInt(rowspan) + 1);
        /* Set properties of new row elements about product. */
        var newRow = $(this).parents('tr').next('tr');
        newRow.find('th').remove();
        newRow.find('input').val('');
        newRow.find('select').val('');
        newRow.find('.product-newProduct').hide();
        newRow.find('.chosen-container').remove();
        newRow.find('.chosen').chosen(window.chosenDefaultOptions);
        newRow.find('.product-batchEdit').each(function()
        {
            var inputName = $(this).attr('name');
            var end = inputName.indexOf('[');
            if(end >= 0)
            {
                var preName = inputName.substring(0, end);
                $(this).attr('name', preName + '[' + v.key + ']');
                $(this).attr('id', preName + v.key);
            }
        })
        v.key ++;
    });
    
    /* Remove a row of product. */
    $(document).on('click', '.btn-remove', function()
    {
        if($('.btn-remove').length == 1)
        {
            $(this).parents('tr').find('input').not('input[type=hidden]').val('');
            return false;
        }
        var rowspan = $('#product_title').attr('rowspan');
        var title   = $('#product_title').html();
        $(this).parents('tr').remove();

        /* Update the order money. */
        var controls = $('.btn-remove');
        $(controls[0]).parents('tr').find('.product-money').change();

        /* Juage if the product_title was removed. */
        if($('#product_title').length > 0)
        {
            $('#product_title').attr('rowspan', parseInt(rowspan) - 1);
        }
        else
        {
            $(controls[0]).parents('tr').find('td:first').before("<th id='product_title' rowspan='" + (rowspan - 1) + "'>" + title + "</th>")       
        }
    });
    
    /* Change product. */
    $(document).on('change', '.select-product', function()
    {
        var unit = $(this).find('option:selected').attr('data-unit');
        if(unit == 0) return false;
        
        $(this).parents('tr').find('[name*=unit]').val(unit);
        $(this).parents('tr').find('[name*=unit]').trigger('chosen:updated');
    });
    
    PRECISION = 100;

    /* Change product amount and compute product money. */
    $(document).on('change', '.product-amount', function()
    {
        var price  = $(this).parents('tr').find('[name*=price]').val();
        var amount = $(this).val();
        if(price == '' || amount == '') return false;
        $(this).parents('tr').find('[name*=moneys]').val(Math.round(price*amount*PRECISION)/PRECISION);
        $(this).parents('tr').find('[name*=moneys]').change();
    });
    
    /* Change product price and compute product money. */
    $(document).on('change', '.product-price', function()
    {
        var amount = $(this).parents('tr').find('[name*=amount]').val();
        var price  = $(this).val();
        if(price == '' || amount == '') return false;
        $(this).parents('tr').find('[name*=moneys]').val(Math.round(price*amount*PRECISION)/PRECISION);
        $(this).parents('tr').find('[name*=moneys]').change();
    });
    
    /* Compute order money. */
    $(document).on('change', '.product-money', function()
    {
        var sum  = 0;
        var moneys = $('.product-money');
        for(i = 0; i < moneys.size(); i++)
        {
            if($.isNumeric(moneys[i].value))
            {
                sum += parseFloat(moneys[i].value);
            }
        }
        $('#money').val(Math.round(sum*PRECISION)/PRECISION);
    });

    if(v.companiesCount == 0) $('.createTrader').click();

    /* When checkbox of new model checked switch tags display.*/
    $(document).on('change', '#createCategory, #createModel, #createUnit', function()
    {
        $(this).parents('td').find('.newProperty').toggle();
        $(this).parents('td').find('.chosen-container').toggle();
        if($(this).prop('checked')) $(this).parents('td').find('.newProperty').focus();
        /* Remove the batch check labels and css. */
        $(this).parents('td').find('.text-error').remove();
        $(this).parents('td').find('.newProperty').css('border-color', '');
    });
});
